<?php

namespace App\Models;

use Override;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fonte extends Model
{
    use HasFactory;

    #[Override]
    protected $table = 'fonti';

    #[Override]
    protected $guarded = [];

    /**
     * @return HasMany<Santo, $this>
     */
    public function santi(): HasMany
    {
        return $this->hasMany(Santo::class);
    }
}
