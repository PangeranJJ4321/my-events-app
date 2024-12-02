<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class RevenueChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Revenue Statistics';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $currentYear = Carbon::now()->year;

        // Pendapatan per bulan
        $monthlyRevenue = Booking::selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('revenue', 'month');

        // Pendapatan per minggu (dalam 1 bulan terakhir)
        $weeklyRevenue = Booking::selectRaw('WEEK(created_at) as week, SUM(total_price) as revenue')
            ->whereBetween('created_at', [now()->subMonth(), now()])
            ->groupBy('week')
            ->orderBy('week')
            ->pluck('revenue', 'week');

        // Pendapatan per tahun
        $yearlyRevenue = Booking::selectRaw('YEAR(created_at) as year, SUM(total_price) as revenue')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('revenue', 'year');

        return [
            'datasets' => [
                [
                    'label' => 'Monthly Revenue',
                    'data' => $monthlyRevenue->values()->toArray(),
                    'backgroundColor' => '#36A2EB',
                ],
                [
                    'label' => 'Weekly Revenue (Last Month)',
                    'data' => $weeklyRevenue->values()->toArray(),
                    'backgroundColor' => '#FF6384',
                ],
                [
                    'label' => 'Yearly Revenue',
                    'data' => $yearlyRevenue->values()->toArray(),
                    'backgroundColor' => '#4BC0C0',
                ],
            ],
            'labels' => $monthlyRevenue->keys()->toArray(), // Bulan untuk Monthly, Week untuk Weekly, Tahun untuk Yearly
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Bisa diganti 'bar' atau 'area'
    }
}
