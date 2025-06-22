<?php

use App\Models\Fonte;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function (): void {
   $user = User::factory()->create();
   actingAs($user);
});


test('vengono tornate le fonti', function (): void{
    $fonte = Fonte::factory()->create();

    $response = get(route('fonte.show', $fonte), ['Accept' => 'application/vnd.api+json']);

    $response->assertStatus(200);
    expect($response->json('data.type'))->toBe('fonte')
        ->and($response->json('data.attributes.nome'))->toBe($fonte->nome)
        ->and($response->json('data.attributes.url'))->toBe($fonte->url);
});

test('vengono tornate le fonti anche senza header json', function (): void{
    $fonte = Fonte::factory()->create();

    $response = get(route('fonte.show', $fonte));

    $response->assertStatus(200);
    expect($response->json('data.type'))->toBe('fonte')
        ->and($response->json('data.attributes.nome'))->toBe($fonte->nome)
        ->and($response->json('data.attributes.url'))->toBe($fonte->url);
});

test('la chiamata a fonti incrementa il contatore delle chiamate', function (): void{
    $fonte = Fonte::factory()->create();

    get(route('fonte.show', $fonte));

    expect(User::first()->api_calls)->toBe(1);
});

test('la chiamata a fonti imposta correttamente il valore last_api_call', function (): void{
    $fonte = Fonte::factory()->create();

    get(route('fonte.show', $fonte));

    expect(User::first()->last_api_call)->not->toBeNull();
});
