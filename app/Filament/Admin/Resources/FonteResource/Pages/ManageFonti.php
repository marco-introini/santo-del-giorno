<?php

namespace App\Filament\Admin\Resources\FonteResource\Pages;

use App\Filament\Admin\Resources\FonteResource;
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
