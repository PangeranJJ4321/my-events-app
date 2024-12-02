<?php

namespace App\Filament\Organizer\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;
use App\Models\Review;
use Filament\Support\Enums\IconPosition;
use Illuminate\Support\Facades\Auth;

class ReviewStats extends StatsOverviewWidget
{
    protected ?string $heading = 'Statistik Review';

    protected function getCards(): array
    {
        $userId = Auth::id();

        // Total jumlah review untuk event yang dibuat oleh organizer
        $totalReviews = Review::whereHas('event', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        // Rata-rata rating dari review untuk event
        $averageRating = Review::whereHas('event', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->avg('rating'); // Asumsi kolom rating menyimpan nilai ulasan

        return [
            Card::make('Total Review', $totalReviews)
                ->description('Jumlah ulasan yang diterima')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right', IconPosition::Before)
                ->color('success'),

            Card::make('Rata-rata Rating', number_format($averageRating, 2))
                ->description('Skor rata-rata dari ulasan')
                ->descriptionIcon('heroicon-o-star', IconPosition::Before)
                ->color('primary'),
        ];
    }
}
