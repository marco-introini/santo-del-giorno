<?php

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Santo;

it('has a fonte relationship', function (): void {
    $santo = new Santo;

    expect($santo->fonte())->toBeInstanceOf(BelongsTo::class);
});

it('has a segnalazioni relationship', function (): void {
    $santo = new Santo;

    expect($santo->segnalazioni())->toBeInstanceOf(HasMany::class);
});

it('casts attributes correctly', function (): void {
    $santo = new Santo([
        'onomastico' => 1,
        'onomastico_secondario' => 0,
        'evasa' => '1',
    ]);

    expect($santo->onomastico)->toBeTrue()
        ->and($santo->onomastico_secondario)->toBeFalse()
        ->and($santo->evasa)->toBeTrue();
});
