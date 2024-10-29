<?php

namespace App\Filament\Resources\MechanicsResource\Pages;

use App\Filament\Resources\MechanicsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMechanics extends ListRecords
{
    protected static string $resource = MechanicsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
