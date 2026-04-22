<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Appointment;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAppointmentsWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';
    protected static ?string $heading = 'Latest Appointments';

    public function table(Table $table): Table
    {
        return $table
            ->query(
            Appointment::query()
            ->with(['service', 'doctor'])
            ->latest()
            ->limit(8)
        )
            ->columns([
            Tables\Columns\TextColumn::make('patient_name')
            ->label('Patient')
            ->searchable()
            ->weight('bold'),

            Tables\Columns\TextColumn::make('patient_phone')
            ->label('Phone')
            ->icon('heroicon-m-phone')
            ->copyable(),

            Tables\Columns\TextColumn::make('service.title')
            ->label('Service')
            ->badge()
            ->color('primary'),

            Tables\Columns\TextColumn::make('doctor.name')
            ->label('Doctor')
            ->default('— Not assigned'),

            Tables\Columns\TextColumn::make('appointment_date')
            ->label('Date')
            ->date('D, M j Y')
            ->icon('heroicon-m-calendar'),

            Tables\Columns\BadgeColumn::make('status')
            ->colors([
                'warning' => 'pending',
                'success' => 'confirmed',
                'danger' => 'cancelled',
                'info' => 'completed',
            ])
            ->icons([
                'heroicon-m-clock' => 'pending',
                'heroicon-m-check-circle' => 'confirmed',
                'heroicon-m-x-circle' => 'cancelled',
                'heroicon-m-archive-box' => 'completed',
            ]),

            Tables\Columns\TextColumn::make('created_at')
            ->label('Booked')
            ->since()
            ->color('gray'),
        ])
            ->actions([
            Tables\Actions\Action::make('view')
            ->url(fn(Appointment $record) => route('filament.admin.resources.appointments.edit', $record))
            ->icon('heroicon-m-pencil-square')
            ->color('primary'),
        ]);
    }
}