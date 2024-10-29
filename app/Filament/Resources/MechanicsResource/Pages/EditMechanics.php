<?php

namespace App\Filament\Resources\MechanicsResource\Pages;

use App\Filament\Resources\MechanicsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMechanics extends EditRecord
{
    protected static string $resource = MechanicsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
