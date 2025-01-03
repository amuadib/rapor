<?php

namespace App\Filament\Resources\RombelResource\Pages;

use App\Filament\Resources\RombelResource;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class Pelajaran extends Page
{
    protected static string $resource = RombelResource::class;

    protected static string $view = 'filament.resources.rombel-resource.pages.pelajaran';

    use InteractsWithRecord;

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getTitle(): string
    {
        return 'Pelajaran Rombel ' . $this->record->nama;
    }
}
