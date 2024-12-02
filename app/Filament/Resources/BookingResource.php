<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\FiltersLayout;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use App\Models\User;
use App\Models\Event;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Enums\FiltersLayout as EnumsFiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static array $statuses = [
        'pending' => 'Pending',
        'approved' => 'Approved',
        'canceled' => 'Canceled',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->searchable()
                    ->options(
                        User::all()->pluck('name', 'id')->toArray()
                    ),
                Select::make('event_id')
                    ->label('Event')
                    ->searchable()
                    ->options(
                        Event::all()->pluck('nama_acara', 'id')->toArray()
                    ),
                Forms\Components\DateTimePicker::make('booking_date')
                    ->label('Booking Date')
                    ->required(),
                Forms\Components\TextInput::make('total_tickets')
                    ->label('Total Tickets')
                    ->required()
                    ->numeric(),
                Forms\Components\Radio::make('status')
                    ->label('Status')
                    ->required()
                    ->options(self::$statuses)
                    ->default('pending'),  // Default value is set to 'pending'
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->label('Total Price')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User')->sortable(),
                Tables\Columns\TextColumn::make('event.nama_acara')->label('Event')->sortable(),
                Tables\Columns\TextColumn::make('total_tickets')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('total_price')->numeric()->sortable()->label('Price'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'canceled' => 'Canceled',
                    ])
                    ->label('Filter by Status'),
                // Filter by User
                SelectFilter::make('user_id')
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->label('Filter by User')
                    ->searchable()
                    ->preload(),
                // Filter by Event
                SelectFilter::make('event_id')
                    ->options(Event::all()->pluck('nama_acara', 'id')->toArray())
                    ->label('Filter by Event')
                    ->searchable()
                    ->preload(),
                
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                 
                        if ($data['from'] ?? null) {
                            $indicators[] = Indicator::make('Created from ' . Carbon::parse($data['from'])->toFormattedDateString())
                                ->removeField('from');
                        }
                 
                        if ($data['until'] ?? null) {
                            $indicators[] = Indicator::make('Created until ' . Carbon::parse($data['until'])->toFormattedDateString())
                                ->removeField('until');
                        }
                 
                        return $indicators;
                    })
                ])
            ->filtersLayout(EnumsFiltersLayout::AboveContent)
                    ->filtersFormColumns(2)
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // No relations defined yet
        ];
    }

    public static function navigation(): string
    {
        return 'Bookings';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
