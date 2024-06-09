<?php

use App\Enums\TipoSegnalazione;
use App\Exceptions\OperazioneNonAmmessaException;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use function Pest\Laravel\actingAs;

test('una segnalazione viene associata correttamente a utente loggato', function () {
    $santo = Santo::factory()->create();
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    actingAs($user);
    $segnalazione = Segnalazione::create([
        'user_id' => $otherUser->id,
        'santo_id' => $santo->id,
        'tipo_segnalazione' => fake()->randomElement(TipoSegnalazione::cases()),
        'testo_segnalazione' => fake()->realText(),
    ]);

    expect($segnalazione->user_id)->toBe($user->id);
});

test('una segnalazione non può essere inserita senza essere loggati', function () {
    $santo = Santo::factory()->create();
    $user = User::factory()->create();

    $segnalazione = Segnalazione::create([
        'santo_id' => $santo->id,
        'tipo_segnalazione' => fake()->randomElement(TipoSegnalazione::cases()),
        'testo_segnalazione' => fake()->realText(),
    ]);
})->expectException(OperazioneNonAmmessaException::class);

test('una segnalazione viene associata correttamente ad altro utente se fatta da admin', function () {
    $santo = Santo::factory()->create();
    $normalUser = User::factory()->create();
    $user = User::factory()->admin()->create();

    actingAs($user);
    $segnalazione = Segnalazione::create([
        'user_id' => $normalUser->id,
        'santo_id' => $santo->id,
        'tipo_segnalazione' => fake()->randomElement(TipoSegnalazione::cases()),
        'testo_segnalazione' => fake()->realText(),
    ]);

    expect($segnalazione->user_id)->toBe($normalUser->id);
});
