<?php

namespace App\Filament\Resources\FonteResource\Pages;

use App\Filament\Resources\FonteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFonti extends ManageRecords
{
    protected static string $resource = FonteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
