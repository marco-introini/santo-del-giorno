<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Santo extends Model
{
    use HasFactory;

    protected $table = 'santi';

    protected function casts(): array
    {
        return [];
    }

    public function fonte(): BelongsTo
    {
        return $this->belongsTo(Fonte::class);
    }
}
