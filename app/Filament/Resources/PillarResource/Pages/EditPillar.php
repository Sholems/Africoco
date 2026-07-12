<?php

namespace App\Filament\Resources\PillarResource\Pages;

use App\Filament\Resources\PillarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPillar extends EditRecord
{
    protected static string $resource = PillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
