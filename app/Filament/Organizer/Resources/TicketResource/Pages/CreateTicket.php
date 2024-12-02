<?php

namespace App\Filament\Organizer\Resources\TicketResource\Pages;

use App\Filament\Organizer\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;
}
