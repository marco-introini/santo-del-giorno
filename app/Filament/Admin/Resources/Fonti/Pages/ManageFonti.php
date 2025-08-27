<?php

namespace App\Filament\Admin\Resources\Fonti\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Admin\Resources\Fonti\FonteResource;
use Filament\Resources\Pages\ManageRecords;

class ManageFonti extends ManageRecords
{
    protected static string $resource = FonteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
