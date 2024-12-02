<?php

namespace App\Filament\Organizer\Widgets;

use App\Models\Booking;
use App\Models\Ticket;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class OrganizerStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = Auth::id();

        return [
            Stat::make('Jumlah Event', \App\Models\Event::where('user_id', $userId)->count())
                ->description('Event yang telah diatur')
                ->descriptionIcon('heroicon-o-calendar', IconPosition::Before),
            
            Stat::make('Tiket Terjual', Ticket::whereHas('event', function($query) use ($userId){
                $query->where('user_id', $userId);
            })->count())
                ->description('Total tiket terjual')
                ->descriptionIcon('heroicon-o-ticket', IconPosition::Before),

            Stat::make('Pendapatan Total', '$ ' . number_format(
                Booking::whereHas('event', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->where('status', 'approved')->sum('total_price'), 0, ',', '.'))
                    ->description('Pendapatan dari tiket yang disetujui')
                    ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before),

            // Jumlah Peserta Terdaftar
            Stat::make('Jumlah Peserta', \App\Models\Booking::whereHas('event', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->where('status', 'approved')->count())
                ->description('Total peserta yang disetujui')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before),
            
            // Event Mendatang vs Event Selesai
            Stat::make('Event Mendatang', \App\Models\Event::where('user_id', $userId)
                ->where('tanggal_waktu', '>', now())->count())
                ->description('Event yang akan datang')
                ->descriptionIcon('heroicon-o-clock', IconPosition::Before),
            
            Stat::make('Event Selesai', \App\Models\Event::where('user_id', $userId)
                ->where('tanggal_waktu', '<', now())->count())
                ->description('Event yang telah selesai')
                ->descriptionIcon('heroicon-o-check-circle', IconPosition::Before),
            

        ];
    }
}
