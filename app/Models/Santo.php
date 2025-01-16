<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Santo extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'santi';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'onomastico' => 'boolean',
            'onomastico_secondario' => 'boolean',
            'evasa' => 'boolean',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Fonte, $this>
     */
    public function fonte(): BelongsTo
    {
        return $this->belongsTo(Fonte::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Segnalazione, $this>
     */
    public function segnalazioni(): HasMany
    {
        return $this->hasMany(Segnalazione::class);
    }

}
