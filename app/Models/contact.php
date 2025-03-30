<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class contact extends Model
{
    use HasFactory, Notifiable;
     
   protected $fillable = [
        'name',
        'email',
        'message',
        'subject',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
