<?php

namespace App\Filament\Resources\InputProfileResource\Pages;

use App\Filament\Resources\InputProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInputProfile extends ListRecords
{
    protected static string $resource = InputProfileResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}