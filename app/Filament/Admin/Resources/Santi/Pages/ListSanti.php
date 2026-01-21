<?php

namespace App\Filament\Admin\Resources\Santi\Pages;

use App\Filament\Admin\Resources\Santi\SantoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSanti extends ListRecords
{
    protected static string $resource = SantoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
