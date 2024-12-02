<?php

namespace App\Filament\Organizer\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Filament\Resources\Pages\Page;
use PhpParser\Node\Expr\Cast\Object_;

class ShowEvent extends Page
{
    protected static string $resource = EventResource::class;

    protected static string $view = 'filament.resources.event-resource.pages.show-event';

    protected function getData() : ?Object {
        $id = request()->segment((4));
        $result = Event::with('user')->find($id);

        return $result;
    }
}
