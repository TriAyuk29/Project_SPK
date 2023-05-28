<?php

namespace App\Filament\Resources\SasaranKinerjaResource\Pages;

use App\Filament\Resources\SasaranKinerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSasaranKinerja extends EditRecord
{
    protected static string $resource = SasaranKinerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
