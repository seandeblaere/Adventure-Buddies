<?php

namespace App\Filament\Resources\AdventureResource\Pages;

use App\Filament\Resources\AdventureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdventures extends ListRecords
{
    protected static string $resource = AdventureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
