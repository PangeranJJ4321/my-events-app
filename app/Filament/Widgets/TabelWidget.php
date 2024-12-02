<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TabelWidget extends BaseWidget
{
    protected static ?string $heading = 'Booking History';
    protected static ?int $sort = 3;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Booking::with(['user', 'event'])
                    ->where('status', 'approved')
            )
            ->columns([
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('event.nama_acara')
                    ->label('Event Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('total_price')
                    ->label("Total Price")
                    ->sortable()
                    ->money('USD')
            ]);
    }
}
