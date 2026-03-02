<?php

namespace App\Models;

use Override;
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

    #[Override]
    protected $table = 'segnalazioni';

    #[Override]
    protected $guarded = [];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Santo, $this>
     */
    public function santo(): BelongsTo
    {
        return $this->belongsTo(Santo::class);
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'tipo_segnalazione' => TipoSegnalazione::class,
        ];
    }
}
