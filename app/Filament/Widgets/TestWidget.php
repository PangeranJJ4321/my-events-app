<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\User;
use App\Models\Booking;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            // Stat::make('')
            Stat::make('New Users', User::count())
                ->description(('New users that have joined'))
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('success')
                ->chart([1, 5, 10, 15, 20, 25, 30])
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
            
            Stat::make('New Events', Event::count())
                ->description('New events has create')
                ->descriptionIcon('heroicon-m-calendar-days', IconPosition::Before)
                ->color('success')
                ->chart([0, 3, 5, 10, 15, 20, 30, 50])
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
            
            Stat::make('New Bookings', Booking::count())
                ->description('Total number of bookings made.')
                ->descriptionIcon('heroicon-m-ticket', IconPosition::Before)
                ->color('success')
                ->chart([5, 10, 15, 20, 30, 40, 50])
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),

            Stat::make('Total Revenue', function() {
                    $totalRevenue = Booking::where('status', 'approved')->sum('total_price');
                    if ($totalRevenue >= 1000) {
                        $totalRevenue = number_format($totalRevenue / 1000, 1) . 'K';
                    }
                
                    return $totalRevenue;
                })
                    ->description('Total revenue from approved bookings.')
                    ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                    ->color('success')
                    ->extraAttributes([
                        'class' => 'border rounded-lg shadow-sm',
                    ])
                    ->icon('heroicon-m-currency-dollar'),

               
        ];
    }
}
