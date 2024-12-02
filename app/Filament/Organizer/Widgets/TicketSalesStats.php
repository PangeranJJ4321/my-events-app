<?php

namespace App\Filament\Organizer\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketSalesStats extends ChartWidget
{
    protected static ?string $heading = 'Tiket Terjual per Hari';

    // Mendapatkan data untuk ditampilkan di chart
    protected function getData(): array
    {
        // Ambil user ID untuk memfilter event berdasarkan yang dibuat oleh organizer yang sedang login
        $userId = Auth::id();

        // Ambil data jumlah tiket terjual per hari
        $salesPerDay = Booking::whereHas('tickets', function ($query) use ($userId) {
            $query->whereHas('event', function ($eventQuery) use ($userId) {
                $eventQuery->where('user_id', $userId);
            });
        })
        ->where('status', 'approved')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->selectRaw('DATE(created_at) as date, count(*) as count')
        ->orderBy('date')
        ->get();

        // Siapkan label (tanggal) dan data (jumlah tiket terjual) untuk chart
        $labels = $salesPerDay->pluck('date')->toArray();
        $data = $salesPerDay->pluck('count')->toArray();

        // Return data untuk chart
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Tiket Terjual per Hari',
                    'data' => $data,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ]
            ]
        ];
    }

    // Jenis chart yang ingin digunakan
    protected function getType(): string
    {
        return 'bar'; // Bisa diganti menjadi 'line' jika ingin menggunakan Line Chart
    }
}
