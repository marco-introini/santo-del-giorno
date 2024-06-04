<?php

namespace App\Filament\Resources\SegnalazioniResource\Pages;

use App\Filament\Resources\SegnalazioniResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSegnalazioni extends ListRecords
{
    protected static string $resource = SegnalazioniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
