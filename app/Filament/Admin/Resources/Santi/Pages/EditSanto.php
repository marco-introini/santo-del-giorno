<?php

namespace App\Filament\Admin\Resources\Santi\Pages;

use Override;
use App\Filament\Admin\Resources\Santi\SantoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSanto extends EditRecord
{
    #[Override]
    protected static string $resource = SantoResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
