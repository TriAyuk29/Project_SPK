<?php

namespace App\Filament\Resources\DataPegawaiResource\Pages;

use App\Filament\Resources\DataPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataPegawai extends EditRecord
{
    protected static string $resource = DataPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
