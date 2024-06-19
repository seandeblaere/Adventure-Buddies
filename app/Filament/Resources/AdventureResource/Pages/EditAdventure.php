<?php

namespace App\Filament\Resources\AdventureResource\Pages;

use App\Filament\Resources\AdventureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdventure extends EditRecord
{
    protected static string $resource = AdventureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
