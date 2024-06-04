<?php

namespace App\Models;

use App\Enums\TipoSegnalazione;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Segnalazione extends Model
{
    use HasFactory;

    protected $table = 'segnalazioni';

    protected $casts = [
        'tipo_segnalazione' => TipoSegnalazione::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function santo(): BelongsTo
    {
        return $this->belongsTo(Santo::class);
    }

}
