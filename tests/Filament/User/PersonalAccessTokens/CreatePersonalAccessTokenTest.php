<?php

use App\Filament\User\Resources\PersonalAccessTokens\Pages\CreatePersonalAccessToken;
use App\Models\User;
use Filament\Facades\Filament;
use Laravel\Sanctum\PersonalAccessToken;
use Livewire\Livewire;

it('renders the create token page and can create a token', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(CreatePersonalAccessToken::class)
        ->assertOk()
        ->fillForm([
            'name' => 'My API Token',
            'abilities' => ['view'],
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect();

    expect(PersonalAccessToken::query()->where('tokenable_id', $user->id)->count())->toBe(1);
});
