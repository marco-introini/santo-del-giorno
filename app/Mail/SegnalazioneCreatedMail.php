<?php

namespace App\Mail;

use App\Models\Segnalazione;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SegnalazioneCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Segnalazione $segnalazione) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuova Segnalazione sul Sito',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.segnalazione-created',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
