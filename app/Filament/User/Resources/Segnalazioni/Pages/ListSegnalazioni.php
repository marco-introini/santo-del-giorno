<?php

namespace App\Filament\User\Resources\Segnalazioni\Pages;

use Filament\Actions\CreateAction;
use App\Filament\User\Resources\Segnalazioni\SegnalazioneResource;
use Filament\Resources\Pages\ListRecords;

class ListSegnalazioni extends ListRecords
{
    protected static string $resource = SegnalazioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
