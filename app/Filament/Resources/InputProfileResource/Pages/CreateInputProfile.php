<?php

namespace App\Filament\Resources\InputProfileResource\Pages;

use App\Filament\Resources\InputProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInputProfile extends CreateRecord
{
    protected static string $resource = InputProfileResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
