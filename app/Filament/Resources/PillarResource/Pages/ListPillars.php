<?php

namespace App\Filament\Resources\PillarResource\Pages;

use App\Filament\Resources\PillarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPillars extends ListRecords
{
    protected static string $resource = PillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
