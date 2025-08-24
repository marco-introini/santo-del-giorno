<?php

namespace App\Filament\User\Resources\PersonalAccessTokens\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\User\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonalAccessToken extends ViewRecord
{
    protected static string $resource = PersonalAccessTokenResource::class;

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
