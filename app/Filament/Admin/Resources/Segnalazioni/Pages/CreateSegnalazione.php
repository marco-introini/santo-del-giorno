<?php

namespace App\Filament\Admin\Resources\Segnalazioni\Pages;

use Override;
use App\Filament\Admin\Resources\Segnalazioni\SegnalazioniResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSegnalazione extends CreateRecord
{
    #[Override]
    protected static string $resource = SegnalazioniResource::class;
}
