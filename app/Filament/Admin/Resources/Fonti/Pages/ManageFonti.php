<?php

namespace App\Filament\Admin\Resources\Fonti\Pages;

use Override;
use App\Filament\Admin\Resources\Fonti\FonteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFonti extends ManageRecords
{
    #[Override]
    protected static string $resource = FonteResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
