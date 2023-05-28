<?php

namespace App\Filament\Resources\SasaranKinerjaResource\Pages;

use App\Filament\Resources\SasaranKinerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSasaranKinerja extends ListRecords
{
    protected static string $resource = SasaranKinerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
