<?php

namespace App\Jobs;

use App\Models\contact;
use Illuminate\Bus\Queueable;
use App\Notifications\MessageSend;
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
    public function __construct( public contact $contact)
    {
       
    }
    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::send($this->contact, new MessageSend($this->contact));
    }
}
