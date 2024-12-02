<?php

namespace App\Filament\Organizer\Resources\EventResource\Widgets;

use App\Models\Event;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class EventStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Events', Event::count())
                ->description('New events have been created')
                ->descriptionIcon('heroicon-m-calendar-days', IconPosition::Before)
                ->color('info')
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
            Stat::make('My Events', Event::where('user_id', Auth::id())->count())
                ->description('New events have been created')
                ->descriptionIcon('heroicon-m-calendar-days', IconPosition::Before)
                ->color('success')
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
        ];
    }
}
