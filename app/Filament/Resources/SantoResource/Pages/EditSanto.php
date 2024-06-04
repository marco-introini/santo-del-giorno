<?php

namespace App\Filament\Resources\SantoResource\Pages;

use App\Filament\Resources\SantoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSanto extends EditRecord
{
    protected static string $resource =  SantoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
