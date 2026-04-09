<?php

namespace App\Filament\User\Resources\PersonalAccessTokens\Pages;

use Illuminate\Support\Facades\Date;
use App\Filament\User\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Override;

class CreatePersonalAccessToken extends CreateRecord
{
    #[Override]
    protected static string $resource = PersonalAccessTokenResource::class;

    #[Override]
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    #[Override]
    protected function handleRecordCreation(array $data): Model
    {
        $expiresAt = isset($data['expires_at']) ? Date::parse($data['expires_at']) : null;

        $plainTextToken = auth()->user()->createToken(
            $data['name'],
            $data['abilities'] ?? ['*'],
            $expiresAt,
        )->plainTextToken;

        // Store the plain text token in the session for display
        session()->flash('plainTextToken', $plainTextToken);

        // Get the token model that was just created
        $token = auth()->user()->tokens()->latest()->first();

        return $token;
    }

    protected function afterCreate(): void
    {
        $plainTextToken = session()->get('plainTextToken');

        if ($plainTextToken) {
            Notification::make()
                ->title('Creazione API Token riuscita')
                ->body(new HtmlString(
                    'Token creato. Copialo immediatamente in quanto non sarà possibile vederlo nuovamente:<br><br>'.
                    '<div class="p-4 bg-gray-100 rounded font-mono text-sm break-all">'.$plainTextToken.'</div>'
                ))
                ->success()
                ->persistent()
                ->send();
        }
    }
}
