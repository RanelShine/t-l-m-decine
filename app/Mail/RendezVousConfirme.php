<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RendezVous;

class RendezVousConfirme extends Mailable
{
    use Queueable, SerializesModels;

    public RendezVous $rv;

    public function __construct(RendezVous $rv)
    {
        $this->rv = $rv;
    }

    public function build()
    {
        return $this->subject('Votre consultation Zoom est prête')
                    ->markdown('emails.rendezvous_confirme')
                    ->with(['rv' => $this->rv]);
    }
}
