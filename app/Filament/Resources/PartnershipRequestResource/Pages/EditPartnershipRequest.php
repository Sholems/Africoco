<?php

namespace App\Filament\Resources\PartnershipRequestResource\Pages;

use App\Filament\Resources\PartnershipRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnershipRequest extends EditRecord
{
    protected static string $resource = PartnershipRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
