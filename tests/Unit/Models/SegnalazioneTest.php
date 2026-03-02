<?php

use App\Enums\TipoSegnalazione;
use App\Models\Segnalazione;

it('has a user relationship', function () {
    $segnalazione = new Segnalazione;

    expect($segnalazione->user())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class);
});

it('has a santo relationship', function () {
    $segnalazione = new Segnalazione;

    expect($segnalazione->santo())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class);
});

it('casts attributes correctly', function () {
    $segnalazione = new Segnalazione([
        'tipo_segnalazione' => 'DATA_ERRATA',
    ]);

    expect($segnalazione->tipo_segnalazione)->toBe(TipoSegnalazione::DATA_ERRATA);
});
