<?php

namespace App\Filament\User\Resources\SegnalazioneResource\Pages;

use App\Filament\User\Resources\SegnalazioneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSegnalazione extends EditRecord
{
    protected static string $resource = SegnalazioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
