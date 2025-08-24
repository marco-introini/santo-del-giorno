<?php

namespace App\Filament\Admin\Resources\Santi\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Admin\Resources\Santi\SantoResource;
use Filament\Actions;
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
