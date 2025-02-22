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

test('la chiamata a fonti incrementa il contatore delle chiamate', function (): void{
    $fonte = Fonte::factory()->create();

    get(route('fonte.show', $fonte), ['Accept' => 'application/vnd.api+json']);

    expect(User::first()->api_calls)->toBe(1);
});
