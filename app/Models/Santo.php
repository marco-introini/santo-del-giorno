<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santo extends Model
{
    use HasFactory;

    protected $table = 'santi';

    protected function casts(): array
    {
        return [];
    }
}
