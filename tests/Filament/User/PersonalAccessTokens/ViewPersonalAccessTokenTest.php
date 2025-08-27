<?php

use App\Filament\User\Resources\PersonalAccessTokens\Pages\ViewPersonalAccessToken;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the view token page for own token', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $this->actingAs($user);

    $token = $user->createToken('Viewable')->accessToken; // Sanctum token model

    Livewire::test(ViewPersonalAccessToken::class, ['record' => $token->getKey()])
        ->assertOk();
});
