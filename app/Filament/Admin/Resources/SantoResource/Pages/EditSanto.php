<?php

namespace App\Filament\Admin\Resources\SantoResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Admin\Resources\SantoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSanto extends EditRecord
{
    protected static string $resource =  SantoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
