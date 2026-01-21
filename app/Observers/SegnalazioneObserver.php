<?php

namespace App\Observers;

use App\Exceptions\OperazioneNonAmmessaException;
use App\Mail\SegnalazioneCreatedMail;
use App\Models\Segnalazione;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SegnalazioneObserver
{
    /**
     * @throws OperazioneNonAmmessaException
     */
    public function creating(Segnalazione $segnalazione): void
    {
        if (! Auth::check()) {
            throw new OperazioneNonAmmessaException;
        }

        if (! Auth::user()->isAdmin()) {
            $segnalazione->user_id = Auth::id();
        }
    }

    public function updating(Segnalazione $segnalazione): void {}

    public function created(Segnalazione $segnalazione): void
    {
        $adminUsers = User::where('is_admin', true)->get();
        foreach ($adminUsers as $user) {
            Mail::to($user->email)->send(new SegnalazioneCreatedMail($segnalazione));
        }
    }
}
