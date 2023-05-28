<?php

namespace App\Filament\Resources\SasaranPegawaiResource\Pages;

use App\Filament\Resources\SasaranPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSasaranPegawais extends ListRecords
{
    protected static string $resource = SasaranPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
