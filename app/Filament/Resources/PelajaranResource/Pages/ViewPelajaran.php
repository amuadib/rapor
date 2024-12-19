<?php

namespace App\Filament\Resources\PelajaranResource\Pages;

use App\Filament\Resources\PelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPelajaran extends ViewRecord
{
    protected static string $resource = PelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
