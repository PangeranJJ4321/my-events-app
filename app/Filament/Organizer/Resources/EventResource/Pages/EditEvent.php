<?php

namespace App\Filament\Organizer\Resources\EventResource\Pages;

use App\Filament\Organizer\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    public function before()
    {
        $this->authorizeEvent();
    }

    protected function authorizeEvent()
    {
        $event = $this->record;

        if ($event->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit event ini.');
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
