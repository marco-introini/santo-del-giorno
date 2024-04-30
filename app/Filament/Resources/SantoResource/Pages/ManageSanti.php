<?php

namespace App\Filament\Resources\SantoResource\Pages;

use App\Filament\Resources\SantoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSanti extends ManageRecords
{
    protected static string $resource = SantoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
