<?php

namespace App\Filament\User\Resources\PersonalAccessTokenResource\Pages;

use App\Filament\User\Resources\PersonalAccessTokenResource;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class CreatePersonalAccessToken extends CreateRecord
{
    protected static string $resource = PersonalAccessTokenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Don't use the default creation method since we need to use createToken
        $plainTextToken = auth()->user()->createToken(
            $data['name'],
            $data['abilities'] ?? ['*'],
            $data['expires_at'] ?? null
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
                ->title('API Token Created')
                ->body(new HtmlString(
                    'Token creato. Copialo immediatamente in quanto non sarà possibile vederlo nuovamente:<br><br>' .
                    '<div class="p-4 bg-gray-100 rounded font-mono text-sm break-all">' . $plainTextToken . '</div>'
                ))
                ->success()
                ->persistent()
                ->actions([
                    Action::make('copy')
                        ->label('Copy to Clipboard')
                        ->icon('heroicon-o-clipboard')
                        ->button()
                        ->color('primary')
                        ->extraAttributes([
                            'x-data' => '{}',
                            'x-on:click' => 'navigator.clipboard.writeText("'.$plainTextToken.'"); $dispatch("notify", { message: "Token copied to clipboard!" })',
                        ]),
                ])
                ->send();
        }
    }
}
