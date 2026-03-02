<?php

namespace App\Filament\User\Resources\Segnalazioni\Pages;

use Override;
use App\Filament\User\Resources\Segnalazioni\SegnalazioneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSegnalazioni extends ListRecords
{
    #[Override]
    protected static string $resource = SegnalazioneResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
