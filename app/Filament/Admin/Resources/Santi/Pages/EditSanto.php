<?php

namespace App\Filament\Admin\Resources\Santi\Pages;

use App\Filament\Admin\Resources\Santi\SantoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSanto extends EditRecord
{
    protected static string $resource = SantoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
