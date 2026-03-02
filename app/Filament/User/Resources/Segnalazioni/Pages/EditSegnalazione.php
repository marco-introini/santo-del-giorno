<?php

namespace App\Filament\User\Resources\Segnalazioni\Pages;

use Override;
use App\Filament\User\Resources\Segnalazioni\SegnalazioneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSegnalazione extends EditRecord
{
    #[Override]
    protected static string $resource = SegnalazioneResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
