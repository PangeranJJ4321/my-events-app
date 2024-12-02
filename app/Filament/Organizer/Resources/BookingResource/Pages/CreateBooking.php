<?php

namespace App\Filament\Organizer\BookingResource\Pages;

use App\Filament\Organizer\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;
}
