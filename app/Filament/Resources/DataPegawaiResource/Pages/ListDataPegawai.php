<?php

namespace App\Filament\Resources\DataPegawaiResource\Pages;

use App\Filament\Resources\DataPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPegawai extends ListRecords
{
    protected static string $resource = DataPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
