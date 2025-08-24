<?php

use function Pest\Laravel\get;

test('admin login page is accessible')->get('/admin/login')->assertStatus(200);

test('login admin non ha il plugin di login automatico', function (): void {
    $response = get('/admin/login');

    expect($response->content())->not->toContain('example.com');
});

test('user login page is accessible')->get('/user/login')->assertStatus(200);

test('login utente non ha il plugin di login automatico', function (): void {
    $response = get('/user/login');

    expect($response->content())->not->toContain('example.com');
});
