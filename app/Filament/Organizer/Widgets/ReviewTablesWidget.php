<?php

namespace App\Filament\Organizer\Widgets;

use App\Models\Review;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class ReviewTablesWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Review::query()->whereHas('event', function ($query) {
                    $query->where('user_id', Auth::id());
                })
            )
            ->columns([
                Tables\Columns\TextColumn::make('event.nama_acara')
                    ->label('Nama Event')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Reviewer')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable(),

                Tables\Columns\TextColumn::make('review_text')
                    ->label('Komentar')
                    ->wrap()
                    ->limit(50),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Review')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('event')
                    ->relationship('event', 'nama_acara')
                    ->label('Filter Event'),
            ])
            ->defaultSort('created_at', 'desc');
            
    }
}
