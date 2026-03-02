<?php

namespace App\Filament\Admin\Resources\Santi\Pages;

use Override;
use App\Filament\Admin\Resources\Santi\SantoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSanto extends CreateRecord
{
    #[Override]
    protected static string $resource = SantoResource::class;
}
