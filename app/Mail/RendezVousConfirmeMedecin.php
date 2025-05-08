<?php

namespace App\Mail;

use App\Models\RendezVous;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousConfirmeMedecin extends Mailable
{
    use Queueable, SerializesModels;

    public $rendezvous;

    public function __construct(RendezVous $rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    public function build()
    {
        return $this->subject('Rendez-vous confirmé')
                    ->view('emails.rendezvous_confirme_medecin');
    }
}
