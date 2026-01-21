<?php

namespace App\Filament\User\Resources\Segnalazioni\Pages;

use App\Filament\User\Resources\Segnalazioni\SegnalazioneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSegnalazione extends EditRecord
{
    protected static string $resource = SegnalazioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
