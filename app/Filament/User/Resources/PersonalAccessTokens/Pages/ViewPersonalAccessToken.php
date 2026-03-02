<?php

namespace App\Filament\User\Resources\PersonalAccessTokens\Pages;

use Override;
use App\Filament\User\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonalAccessToken extends ViewRecord
{
    #[Override]
    protected static string $resource = PersonalAccessTokenResource::class;

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Revoca Token')
                ->modalHeading('Revoca API Token')
                ->modalDescription('Sei sicuro di voler revocare questo Token? Le chiamate che lo usano smetteranno di funzionare'),
        ];
    }
}
