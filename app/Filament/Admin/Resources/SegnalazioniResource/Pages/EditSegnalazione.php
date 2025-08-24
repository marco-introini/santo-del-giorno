<?php

namespace App\Filament\Admin\Resources\SegnalazioniResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Admin\Resources\SegnalazioniResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSegnalazione extends EditRecord
{
    protected static string $resource = SegnalazioniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
