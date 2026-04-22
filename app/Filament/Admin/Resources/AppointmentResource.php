<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Clinic Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'patient_name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Patient Information')
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('patient_name')
                        ->label('Full Name')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('John Doe'),

                    Forms\Components\TextInput::make('patient_phone')
                        ->label('Phone Number')
                        ->tel()
                        ->required()
                        ->placeholder('+250 788 000 000'),

                    Forms\Components\TextInput::make('patient_email')
                        ->label('Email Address')
                        ->email()
                        ->placeholder('patient@example.com')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Appointment Details')
                ->icon('heroicon-o-calendar-days')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('service_id')
                        ->label('Service')
                        ->relationship('service', 'title')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\Select::make('doctor_id')
                        ->label('Preferred Doctor')
                        ->options(Doctor::where('is_active', true)->pluck('name', 'id'))
                        ->searchable()
                        ->placeholder('No preference'),

                    Forms\Components\DatePicker::make('appointment_date')
                        ->label('Appointment Date')
                        ->required()
                        ->minDate(today())
                        ->native(false),

                    Forms\Components\Select::make('status')
                        ->options([
                            'pending'   => 'Pending',
                            'confirmed' => 'Confirmed',
                            'completed' => 'Completed',
                            'cancelled' => 'Cancelled',
                        ])
                        ->default('pending')
                        ->required()
                        ->native(false),

                    Forms\Components\Textarea::make('message')
                        ->label('Patient Note')
                        ->placeholder('Any additional information from the patient...')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('patient_name')
                    ->label('Patient')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('patient_phone')
                    ->label('Phone')
                    ->icon('heroicon-m-phone')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Phone number copied'),

                Tables\Columns\TextColumn::make('service.title')
                    ->label('Service')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                Tables\Columns\TextColumn::make('doctor.name')
                    ->label('Doctor')
                    ->default('Not assigned')
                    ->sortable(),

                Tables\Columns\TextColumn::make('appointment_date')
                    ->label('Date')
                    ->date('D, M j Y')
                    ->sortable()
                    ->icon('heroicon-m-calendar'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger'  => 'cancelled',
                        'info'    => 'completed',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Booked')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\SelectFilter::make('service')
                    ->relationship('service', 'title')
                    ->label('Service'),
            ])
            ->actions([
                Tables\Actions\Action::make('confirm')
                    ->label('Confirm')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->visible(fn (Appointment $record) => $record->status === 'pending')
                    ->action(fn (Appointment $record) => $record->update(['status' => 'confirmed']))
                    ->requiresConfirmation(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('confirm_selected')
                        ->label('Confirm Selected')
                        ->icon('heroicon-m-check')
                        ->color('success')
                        ->action(fn ($records) => $records->each->update(['status' => 'confirmed']))
                        ->requiresConfirmation(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit'   => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}