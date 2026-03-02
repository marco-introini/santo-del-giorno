<?php

namespace App\Filament\Admin\Resources\Segnalazioni\Pages;

use Override;
use App\Filament\Admin\Resources\Segnalazioni\SegnalazioniResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSegnalazioni extends ListRecords
{
    #[Override]
    protected static string $resource = SegnalazioniResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
