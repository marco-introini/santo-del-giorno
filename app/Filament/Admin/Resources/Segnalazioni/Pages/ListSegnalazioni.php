<?php

namespace App\Filament\Admin\Resources\Segnalazioni\Pages;

use App\Filament\Admin\Resources\Segnalazioni\SegnalazioniResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSegnalazioni extends ListRecords
{
    protected static string $resource = SegnalazioniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
