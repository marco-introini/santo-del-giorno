<?php

namespace App\Filament\User\Resources\Segnalazioni\Pages;

use Override;
use App\Filament\User\Resources\Segnalazioni\SegnalazioneResource;
use Filament\Resources\Pages\ViewRecord;

class ViewSegnalazione extends ViewRecord
{
    #[Override]
    protected static string $resource = SegnalazioneResource::class;
}
