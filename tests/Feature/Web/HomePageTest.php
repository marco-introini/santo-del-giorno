<?php

use function Pest\Laravel\get;
use function Pest\Laravel\withoutVite;

beforeEach(function (){
   withoutVite();
});


it('returns a successful response', function () {
    $response = get('/');

    $response->assertStatus(200);
});

it('shows my github', function () {
    $response = get('/');

    expect($response->content())->toContain('marco-introini');
});
