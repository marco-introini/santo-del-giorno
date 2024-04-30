<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fonte extends Model
{
    use HasFactory;

    protected $table = 'fonti';

    public function santi(): HasMany
    {
        return $this->hasMany(Santo::class);
    }

}
