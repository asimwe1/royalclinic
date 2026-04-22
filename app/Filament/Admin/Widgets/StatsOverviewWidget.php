<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalAppointments = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();
        $confirmedToday = Appointment::where('status', 'confirmed')
            ->whereDate('appointment_date', today())
            ->count();
        $activeDoctors = Doctor::where('is_active', true)->count();
        $activeServices = Service::where('is_active', true)->count();
        $thisMonth = Appointment::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        return [
            Stat::make('Total Appointments', $totalAppointments)
            ->description('All time bookings')
            ->descriptionIcon('heroicon-m-calendar-days')
            ->color('primary')
            ->chart([7, 3, 4, 5, 6, $totalAppointments]),

            Stat::make('Pending Review', $pendingAppointments)
            ->description('Awaiting confirmation')
            ->descriptionIcon('heroicon-m-clock')
            ->color($pendingAppointments > 0 ? 'warning' : 'success'),

            Stat::make("Today's Confirmed", $confirmedToday)
            ->description('Confirmed appointments today')
            ->descriptionIcon('heroicon-m-check-circle')
            ->color('success'),

            Stat::make('This Month', $thisMonth)
            ->description('New bookings in ' . now()->format('F'))
            ->descriptionIcon('heroicon-m-chart-bar')
            ->color('primary'),

            Stat::make('Active Doctors', $activeDoctors)
            ->description('On staff')
            ->descriptionIcon('heroicon-m-user-group')
            ->color('primary'),

            Stat::make('Services Offered', $activeServices)
            ->description('Active treatments')
            ->descriptionIcon('heroicon-m-heart')
            ->color('primary'),
        ];
    }
}