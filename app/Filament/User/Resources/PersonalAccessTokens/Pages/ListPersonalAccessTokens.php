<?php

namespace App\Filament\User\Resources\PersonalAccessTokens\Pages;

use Override;
use App\Filament\User\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPersonalAccessTokens extends ListRecords
{
    #[Override]
    protected static string $resource = PersonalAccessTokenResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Crea Nuovo Token'),
        ];
    }
}
