<?php

use Illuminate\Support\Facades\Date;
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

it('can create a token with expires_at just before the MySQL TIMESTAMP limit', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $this->actingAs($user);

    $expiresAt = Date::create(2038, 1, 19, 2, 59, 59);

    Livewire::test(CreatePersonalAccessToken::class)
        ->assertOk()
        ->fillForm([
            'name' => 'Token near limit',
            'abilities' => ['view'],
            'expires_at' => $expiresAt,
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect();

    $token = PersonalAccessToken::query()
        ->where('tokenable_id', $user->id)
        ->where('expires_at', $expiresAt)
        ->first();

    expect($token)->not->toBeNull();
});

it('cannot set expires_at beyond the MySQL TIMESTAMP limit', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $this->actingAs($user);

    $expiresAt = Date::create(2038, 1, 19, 3, 0, 1);

    Livewire::test(CreatePersonalAccessToken::class)
        ->assertOk()
        ->fillForm([
            'name' => 'Token over limit',
            'abilities' => ['view'],
            'expires_at' => $expiresAt,
        ])
        ->call('create')
        ->assertHasFormErrors(['expires_at' => 'before_or_equal']);
});
