<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    // * Une ordonnace appartient a un medecin
    public function medecin ()
    {
        return $this->belongsTo(Medecin::class);
    }

    // * Une Ordonnance appartient a un patient
    public function patient ()
    {
        return $this->belongsTo(Patient::class);
    }
}
