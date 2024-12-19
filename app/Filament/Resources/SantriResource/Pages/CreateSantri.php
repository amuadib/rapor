<?php

namespace App\Filament\Resources\SantriResource\Pages;

use App\Filament\Resources\SantriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSantri extends CreateRecord
{
    protected static string $resource = SantriResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['nis'] == '') {
            $srv = new \App\Services\SantriService;
            $data['nis'] = $srv->getUrutanNIS();
        }

        return $data;
    }
}
