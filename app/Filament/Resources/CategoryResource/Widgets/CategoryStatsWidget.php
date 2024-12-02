<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Category', Category::count())
                ->description('Total category.')
                ->descriptionIcon('heroicon-m-tag', IconPosition::Before)
                ->color('warning')
                ->extraAttributes([
                    'class' => 'border rounded-lg shadow-sm',
                ]),
            
        ];
    }
}
