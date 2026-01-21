<?php

use App\Filament\User\Resources\PersonalAccessTokens\Pages\ListPersonalAccessTokens;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;
use Livewire\Livewire;

it('shows only the authenticated user tokens in the table', function (): void {
    Filament::setCurrentPanel('user');

    $userA = User::factory()->create();
    $userB = User::factory()->create();

    // Create tokens for both users
    $this->actingAs($userA);
    $tokensA = collect(range(1, 2))->map(fn () => $userA->createToken('Token A '.Str::random(4))->accessToken)->map(fn ($token) => PersonalAccessToken::find($token->id));

    $this->actingAs($userB);
    $tokensB = collect(range(1, 2))->map(fn () => $userB->createToken('Token B '.Str::random(4))->accessToken)->map(fn ($token) => PersonalAccessToken::find($token->id));

    // Act as user A and ensure only their tokens are visible
    $this->actingAs($userA);

    Livewire::test(ListPersonalAccessTokens::class)
        ->assertOk()
        ->assertCanSeeTableRecords($tokensA)
        ->assertCanNotSeeTableRecords($tokensB);
});
