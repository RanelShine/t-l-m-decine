<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    public function patient ()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medecin ()
    {
        return $this->belongsTo(Medecin::class);
    }
}
