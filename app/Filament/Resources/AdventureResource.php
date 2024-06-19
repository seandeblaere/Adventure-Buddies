<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdventureResource\Pages;
use App\Filament\Resources\AdventureResource\RelationManagers;
use App\Models\Adventure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class AdventureResource extends Resource
{
    protected static ?string $model = Adventure::class;

    // Use a valid icon name
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->label('Location')
                    ->required(),
                Forms\Components\DateTimePicker::make('date')
                    ->label('Date')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->label('Duration (minutes)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('capacity')
                    ->label('Capacity')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('image_url')
                    ->label('Image URL')
                    ->url()
                    ->nullable(),
                Forms\Components\Select::make('user_id')
                    ->relationship('creator', 'name')
                    ->label('Creator')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('location')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date')
                    ->sortable(),
                TextColumn::make('duration')
                    ->sortable(),
                TextColumn::make('capacity')
                    ->sortable(),
                TextColumn::make('creator.name')
                    ->label('Creator')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->relationship('creator', 'name')
                    ->label('Creator')
                    ->options(
                        fn (): array => \App\Models\User::pluck('name', 'id')->toArray()
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdventures::route('/'),
            'create' => Pages\CreateAdventure::route('/create'),
            'edit' => Pages\EditAdventure::route('/{record}/edit'),
        ];
    }
}

