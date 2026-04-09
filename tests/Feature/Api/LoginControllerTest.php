<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

it('allows a user to login with valid credentials', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    $response = postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'code',
            'data' => ['token'],
        ]);
});

it('does not allow login with invalid credentials', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    $response = postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'wrong-password',
    ]);

    $response->assertStatus(401)
        ->assertJsonFragment(['message' => 'Credenziali errate']);
});

it('allows a user to logout', function (): void {
    $user = User::factory()->create();
    actingAs($user, 'sanctum');

    $response = postJson('/api/logout');

    $response->assertStatus(200)
        ->assertJsonFragment(['message' => 'Logout OK']);

    expect($user->tokens)->toBeEmpty();
});
