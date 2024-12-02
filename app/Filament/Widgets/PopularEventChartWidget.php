<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Widgets\ChartWidget;

class PopularEventChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Popular Events';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
      
            $events = Event::withCount('bookings')
                ->orderBy('Bookings_count', 'desc')
                ->take(5)
                ->get();
            
                return [
                    'datasets' => [
                        [
                            'label' => 'Number of Bookings',
                            'data' => $events->pluck('bookings_count')->toArray(),
                            'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                        ],
                    ],
                    'labels' => $events->pluck('nama_acara')->toArray(),
                ];
            

    }

    protected function getType(): string
    {
        return 'bar';
    }
}
