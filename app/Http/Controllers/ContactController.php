<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessContact;
use App\Models\contact;
use Illuminate\Http\Request;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Process;

class ContactController extends Controller
{
    public function index ()
    {
        return view('contact');
    }

    public function contact (Request $request)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'message' => 'required|string',
            'subject' => 'required|string',
    
         ]);
         
         $contact = contact::query()->create($validatedData); 
         
         ProcessContact::dispatch($contact);
        //  Notification::send($contact, new MessageSend($contact));
         return back()->with('success', 'Message  successfully sent');
    } 
}
