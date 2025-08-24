<?php

namespace App\Filament\User\Resources\Segnalaziones\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\User\Resources\Segnalaziones\SegnalazioneResource;
use Filament\Actions;
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
