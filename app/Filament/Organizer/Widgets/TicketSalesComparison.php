<?php

namespace App\Filament\Organizer\Widgets;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Ticket;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class TicketSalesComparison extends ChartWidget
{
    protected static ?string $heading = 'Perbandingan Tiket Terjual vs Total Tiket';

    protected function getData(): array
    {

        $userId = Auth::id();

        $totalTickets = Event::where('user_id', $userId)->sum('kouta_tiket');

        $soldTickets = Booking::whereHas('event', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'approved')->count();

        return [
            'labels' => ['Tiket Terjual', 'Tiket Tersedia'],
            'datasets' => [
                [
                    'data' =>   [ $soldTickets, $totalTickets - $soldTickets],
                    'backgroundColor' => ['#4CAF50', '#F44336'],
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
