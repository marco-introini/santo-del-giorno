<?php

use function Pest\Laravel\get;
use function Pest\Laravel\withoutVite;

beforeEach(function (): void {
    withoutVite();
});

it('returns a successful response', function (): void {
    $response = get('/');

    $response->assertStatus(200);
});

it('shows my github', function (): void {
    $response = get('/');

    expect($response->content())->toContain('marco-introini');
});
