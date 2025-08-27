<?php

namespace App\Filament\User\Resources\PersonalAccessTokens\Pages;

use Filament\Actions\CreateAction;
use App\Filament\User\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use Filament\Resources\Pages\ListRecords;

class ListPersonalAccessTokens extends ListRecords
{
    protected static string $resource = PersonalAccessTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Crea Nuovo Token'),
        ];
    }
}
