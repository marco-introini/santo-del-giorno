<?php

namespace App\Observers;

use App\Exceptions\OperazioneNonAmmessaException;
use App\Models\Segnalazione;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class SegnalazioneObserver
{
    /**
     * @throws OperazioneNonAmmessaException
     */
    public function creating(Segnalazione $segnalazione): void
    {
        if (!Auth::check()) {
            throw new OperazioneNonAmmessaException();
        }

        if (!Auth::user()->isAdmin()) {
            $segnalazione->user_id = Auth::id();
        }
    }

    public function updating(Segnalazione $segnalazione): void
    {
    }
}
