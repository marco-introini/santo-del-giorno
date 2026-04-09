<?php

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Fonte;

it('has a santi relationship', function (): void {
    $fonte = new Fonte;

    expect($fonte->santi())->toBeInstanceOf(HasMany::class);
});
