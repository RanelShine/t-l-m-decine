<?php

namespace App\Jobs;

<<<<<<< HEAD
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use App\Notifications\MessageSent;
=======
use App\Models\contact;
use Illuminate\Bus\Queueable;
use App\Notifications\MessageSend;
>>>>>>> rara
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;

class ProcessContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
<<<<<<< HEAD
    public function __construct(public Contact $contact)
    {
        //
    }
=======
    public function __construct( public contact $contact)
    {
       
    }
    
>>>>>>> rara

    /**
     * Execute the job.
     */
    public function handle(): void
    {
<<<<<<< HEAD
        Notification::send ($this->contact, new MessageSent($this->contact));
=======
        Notification::send($this->contact, new MessageSend($this->contact));
>>>>>>> rara
    }
}
