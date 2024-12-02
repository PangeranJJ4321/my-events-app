<?php

namespace App\Filament\Resources\BookingResource\Widgets;

use App\Models\Booking;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Bookings', Booking::count())
                ->description('New bookings have been created')
                ->descriptionIcon('heroicon-m-document-check', IconPosition::Before)
                ->color('info')
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
            ]),
            Stat::make('Approved Bookings', Booking::where('status', 'approved')->count())
            ->description('Total bookings that have been approved.')
            ->descriptionIcon('heroicon-m-document-check', IconPosition::Before)
            ->color('success')
            ->extraAttributes([
                'class' => 'border rounded-lg shadow-sm',
            ]),
        
            Stat::make('Pending Bookings', Booking::where('status', 'pending')->count())
                ->description('Total bookings that are still pending approval.')
                ->descriptionIcon('heroicon-m-clock', IconPosition::Before)
                ->color('warning')
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
            
            Stat::make('Canceled Bookings', Booking::where('status', 'canceled')->count())
                ->description('Total bookings that have been canceled.')
                ->descriptionIcon('heroicon-m-x-circle', IconPosition::Before)
                ->color('danger')
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
        
        ];
    }
}
