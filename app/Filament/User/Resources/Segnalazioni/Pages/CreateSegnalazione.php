<?php

namespace App\Filament\User\Resources\Segnalazioni\Pages;

use Override;
use App\Filament\User\Resources\Segnalazioni\SegnalazioneResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSegnalazione extends CreateRecord
{
    #[Override]
    protected static string $resource = SegnalazioneResource::class;
}
