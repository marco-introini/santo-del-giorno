<?php

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use Filament\Panel;
use Illuminate\Support\Facades\Storage;

it('determines if a user is an admin', function (): void {
    $admin = new User(['is_admin' => true]);
    $user = new User(['is_admin' => false]);

    expect($admin->isAdmin())->toBeTrue()
        ->and($user->isAdmin())->toBeFalse();
});

it('determines panel access correctly', function (): void {
    $admin = new User(['is_admin' => true]);
    $user = new User(['is_admin' => false]);

    $adminPanel = Mockery::mock(Panel::class);
    $adminPanel->shouldReceive('getId')->andReturn('admin');

    $userPanel = Mockery::mock(Panel::class);
    $userPanel->shouldReceive('getId')->andReturn('user');

    $otherPanel = Mockery::mock(Panel::class);
    $otherPanel->shouldReceive('getId')->andReturn('other');

    expect($admin->canAccessPanel($adminPanel))->toBeTrue()
        ->and($admin->canAccessPanel($userPanel))->toBeFalse()
        ->and($user->canAccessPanel($adminPanel))->toBeFalse()
        ->and($user->canAccessPanel($userPanel))->toBeTrue()
        ->and($user->canAccessPanel($otherPanel))->toBeFalse();
});

it('returns the filament avatar url', function (): void {
    Storage::fake('avatars');

    $userWithAvatar = new User(['avatar' => 'path/to/avatar.jpg']);
    $userWithoutAvatar = new User(['avatar' => null]);

    expect($userWithAvatar->getFilamentAvatarUrl())->toBe(Storage::disk('avatars')->url('path/to/avatar.jpg'))
        ->and($userWithoutAvatar->getFilamentAvatarUrl())->toBeNull();
});

it('has a segnalazioni relationship', function (): void {
    $user = new User;

    expect($user->segnalazioni())->toBeInstanceOf(HasMany::class);
});
