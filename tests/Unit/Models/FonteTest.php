<?php

use App\Models\Fonte;

it('has a santi relationship', function () {
    $fonte = new Fonte;

    expect($fonte->santi())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class);
});
