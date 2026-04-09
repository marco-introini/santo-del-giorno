<?php

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\TipoSegnalazione;
use App\Models\Segnalazione;

it('has a user relationship', function (): void {
    $segnalazione = new Segnalazione;

    expect($segnalazione->user())->toBeInstanceOf(BelongsTo::class);
});

it('has a santo relationship', function (): void {
    $segnalazione = new Segnalazione;

    expect($segnalazione->santo())->toBeInstanceOf(BelongsTo::class);
});

it('casts attributes correctly', function (): void {
    $segnalazione = new Segnalazione([
        'tipo_segnalazione' => 'DATA_ERRATA',
    ]);

    expect($segnalazione->tipo_segnalazione)->toBe(TipoSegnalazione::DATA_ERRATA);
});
