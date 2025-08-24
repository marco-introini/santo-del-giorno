<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasAvatar
{
    use HasFactory, Notifiable, HasApiTokens, TwoFactorAuthenticatable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'is_admin'
    ];

    /**
     * @return array{
     *     email_verified_at: 'datetime',
     *     is_admin: 'boolean',
     *     password: 'hashed',
     *     created_at: 'datetime',
     *     updated_at: 'datetime',
     *     last_api_call: 'datetime'
     * }
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'last_api_call' => 'datetime',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->isAdmin();
        }
        if ($panel->getId() === 'user') {
            return !$this->isAdmin();
        }

        return false;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar ? Storage::disk('avatars')->url($this->avatar) : null ;
    }

    /**
     * @return HasMany<Segnalazione, $this>
     */
    public function segnalazioni(): HasMany
    {
        return $this->hasMany(Segnalazione::class, 'user_id');
    }
}
