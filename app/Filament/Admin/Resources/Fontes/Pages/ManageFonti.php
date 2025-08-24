<?php

namespace App\Filament\Admin\Resources\Fontes\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Admin\Resources\Fontes\FonteResource;
use Filament\Actions;
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
