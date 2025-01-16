<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fonte extends Model
{
    use HasFactory;

    protected $table = 'fonti';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Santo, $this>
     */
    public function santi(): HasMany
    {
        return $this->hasMany(Santo::class);
    }

}
