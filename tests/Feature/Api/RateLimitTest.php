<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\getJson;

beforeEach(function (): void {
    RateLimiter::clear('chiamate_api');
});

test('gli utenti autenticati hanno un rate limit di 10 chiamate al minuto', function (): void {
    $user = User::factory()->create();
    actingAs($user); // Usiamo il driver di default, auth:sanctum rimosso dalle rotte

    for ($i = 0; $i < 10; $i++) {
        getJson(route('santo.index'))->assertSuccessful();
    }

    getJson(route('santo.index'))->assertStatus(429);
});

test('gli utenti autenticati diversi hanno rate limit separati', function (): void {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    actingAs($user1);
    for ($i = 0; $i < 10; $i++) {
        getJson(route('santo.index'))->assertSuccessful();
    }
    getJson(route('santo.index'))->assertStatus(429);

    actingAs($user2);
    getJson(route('santo.index'))->assertSuccessful();
});

test('gli utenti non autenticati non possono chiamare la API', function (): void {
    getJson(route('santo.index'))->assertUnauthorized();
});
