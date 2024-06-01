<?php

namespace App\Models;

use App\Enums\TipoSegnalazione;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segnalazione extends Model
{
    use HasFactory;

    protected $table = 'segnalazioni';

    protected $casts = [
        'tipo_segnalazione' => TipoSegnalazione::class,
    ];
}
