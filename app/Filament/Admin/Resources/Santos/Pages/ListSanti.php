<?php

namespace App\Filament\Admin\Resources\Santos\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Admin\Resources\Santos\SantoResource;
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
