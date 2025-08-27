<?php

use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Filament\Admin\Resources\Users\Pages\ListUsers;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the list users page and shows users', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    $users = User::factory()->count(2)->create();

    Livewire::test(ListUsers::class)
        ->assertOk()
        ->assertCanSeeTableRecords($users);
});

it('cannot access the create user page because creation is disabled', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    Livewire::test(CreateUser::class)
        ->assertForbidden();
});
