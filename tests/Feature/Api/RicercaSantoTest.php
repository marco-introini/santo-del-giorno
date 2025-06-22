<?php

use App\Models\Fonte;
use App\Models\Santo;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function (): void {
    Fonte::factory()->create();
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('un santo viene ricercato correttamente per nome', function (): void {
    $santo = Santo::factory()->create();

    $response = get(route('santo.findByName', ['nome' => $santo->nome]));

    $response->assertStatus(200);
    $response->assertJsonFragment(['nome' => $santo->nome]);
});

test('un santo viene ricercato correttamente per data', function (): void {
    $santo = Santo::factory()->create();

    $response = get(route('santo.findByDate', [
        'mese' => $santo->mese,
        'giorno' => $santo->giorno,
        ]), ['accept' => 'application/vnd.api+json']);

    $response->assertStatus(200);
    $response->assertJsonFragment(['nome' => $santo->nome]);
});

test('viene gestito errore se data nun è numerico', function (): void {
    $santo = Santo::factory()->create();

    $response = get(route('santo.findByDate', [
        'mese' => 'SSS',
        'giorno' => $santo->giorno,
    ]), ['accept' => 'application/vnd.api+json']);

    $response->assertStatus(422);
});

test('una chiamata ad api santo incrementa il conto delle chiamate', function (): void {
    $santo = Santo::factory()->create();

    get(route('santo.findByName', ['nome' => $santo->nome]));

    $this->user->refresh();
    expect($this->user->api_calls)->toBe(1);
});
