<?php

namespace App\Filament\Widgets;

use App\Models\Adventure;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdventureStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number of adventures', Adventure::count()),
            Stat::make('Avg adventure duration', Adventure::avg('duration') . ' minutes'),
            Stat::make('Total adventure capacity', Adventure::sum('capacity')),
        ];
    }
}

