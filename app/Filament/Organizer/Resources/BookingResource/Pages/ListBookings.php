<?php

namespace App\Filament\Organizer\Resources\BookingResource\Pages;

use App\Filament\Organizer\Resources\BookingResource;
use App\Filament\Organizer\Resources\BookingResource\Widgets\BookingStatsWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookings extends ListRecords
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BookingStatsWidget::class,
        ];

    }
}
