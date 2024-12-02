<?php

namespace App\Filament\Organizer\Resources;

use App\Filament\Organizer\Resources\EventResource\Pages;
use App\Filament\Organizer\Resources\EventResource\RelationManagers;
use Filament\Tables\Actions\Action;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Filters\SelectFilter;
use App\Policies\EventPolicy;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()) 
                    ->label('User ID'),

                Forms\Components\TextInput::make('nama_acara')
                    ->required()
                    ->label('Event Name'),
                
                Forms\Components\DateTimePicker::make('tanggal_waktu')
                    ->required()
                    ->label('Date and Time')
                    ->rules(['after_or_equal:today']),
                    
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->label('Location'),

                Forms\Components\TextInput::make('harga_tiket')
                    ->numeric()
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->label('Ticket Price'),

                Forms\Components\TextInput::make('kouta_tiket')
                    ->numeric()
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->label('Ticket Quota'),

                Forms\Components\Select::make('categories')
                    ->multiple()
                    ->relationship('categories', 'category_name')
                    ->preload()
                    ->label('Event Category')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->label('Description')
                    ->rows(5),
                
                Forms\Components\FileUpload::make('gambar_acara')
                    ->image()
                    ->label('Event Image'),

              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_acara')
                    ->label('Event Name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('deskripsi')
                //     ->label('Description')
                //     ->limit(50),
                Tables\Columns\TextColumn::make('tanggal_waktu')
                    ->label('Date and Time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Location'),
                Tables\Columns\TextColumn::make('harga_tiket')
                    ->label('Ticket Price'),
                Tables\Columns\TextColumn::make('kouta_tiket')
                    ->label('Ticket Quota'),
                // Tables\Columns\TextColumn::make('categories.category_name')
                //     ->label('Event Category'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Created by')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('gambar_acara')
                    // ->label('Image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Create At'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Update At'),   
            ])
            ->filters([
                SelectFilter::make('Category')
                    ->relationship('categories', 'category_name')
                    ->searchable()
                    ->preload()
                    ->label('Filter by Category'),

                SelectFilter::make('User')
                    ->relationship('user', 'name')
                    ->label('Create by ')
                    ->preload()
                    ->searchable()
            
                
            ])
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )
            ->actions([
                Action::make('Details')
                    ->url(fn(Event $record) => 'events/show/' .$record->id)
                    ->extraAttributes(['class' => 'bg-blue-500 text-white hover:bg-blue-700 !important']),
                Tables\Actions\EditAction::make()->color('primary')
                    ->visible(fn ($record) => $record->user_id === Auth::id())
                    ->url(fn ($record) => route('filament.resources.events.edit', ['record' => $record->id])),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn ($record) => $record->user_id === Auth::id()),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
            'show' => Pages\ShowEvent::route('/show/{id}')
        ];
    }
}
