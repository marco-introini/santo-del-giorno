<?php

use App\Models\Fonte;
use App\Models\Santo;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    Fonte::factory()->create();
    $user = User::factory()->create();
    actingAs($user);
});

test('un santo viene ricercato correttamente per nome', function () {
    $santo = Santo::factory()->create();

    $response = get(route('santo.findByName', ['nome' => $santo->nome]), ['accept' => 'application/vnd.api+json']);

    $response->assertStatus(200);
    $response->assertJsonFragment(['nome' => $santo->nome]);
});

test('un santo viene ricercato correttamente per data', function () {
    $santo = Santo::factory()->create();

    $response = get(route('santo.findByDate', [
        'mese' => $santo->mese,
        'giorno' => $santo->giorno,
        ]), ['accept' => 'application/vnd.api+json']);

    $response->assertStatus(200);
    $response->assertJsonFragment(['nome' => $santo->nome]);
});

test('viene gestito errore se data nun è numerico', function () {
    $santo = Santo::factory()->create();

    $response = get(route('santo.findByDate', [
        'mese' => 'SSS',
        'giorno' => $santo->giorno,
    ]), ['accept' => 'application/vnd.api+json']);

    $response->assertStatus(422);
});
