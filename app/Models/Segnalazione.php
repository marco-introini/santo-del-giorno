<?php

namespace App\Models;

use App\Enums\TipoSegnalazione;
use App\Observers\SegnalazioneObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(SegnalazioneObserver::class)]
class Segnalazione extends Model
{
    use HasFactory;

    protected $table = 'segnalazioni';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Santo, $this>
     */
    public function santo(): BelongsTo
    {
        return $this->belongsTo(Santo::class);
    }
    protected function casts(): array
    {
        return [
            'tipo_segnalazione' => TipoSegnalazione::class,
        ];
    }

}
