<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Filament\Resources\EventResource\Widgets\EventStatsWidget;
use App\Models\Event;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EventStatsWidget::class,
        ];
    }

    public function getTabs(): array
{
    return [
        'All' => Tab::make(),

        'This Week' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => 
                $query->whereBetween('tanggal_waktu', [now()->startOfWeek(), now()->endOfWeek()])
            )
            ->badge(
                Event::query()
                    ->whereBetween('tanggal_waktu', [now()->startOfWeek(), now()->endOfWeek()])
                    ->count()
            ),

        'This Month' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => 
                $query->whereBetween('tanggal_waktu', [now()->startOfMonth(), now()->endOfMonth()])
            )
            ->badge(
                Event::query()
                    ->whereBetween('tanggal_waktu', [now()->startOfMonth(), now()->endOfMonth()])
                    ->count()
            ),

        'Last' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => 
                $query->where('tanggal_waktu', '<', now()->startOfDay())
            )
            ->badge(
                Event::query()
                    ->where('tanggal_waktu', '<', now()->startOfDay())
                    ->count()
            ),
    ];
}

}
