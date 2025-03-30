<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    public function medecin ()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function patient ()
    {
        return $this->belongsTo(Patient::class);
    }
}
