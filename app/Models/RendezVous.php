<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    // * Un RDV appartient a un patient 
    public function patient ()
    {
        return $this->belongsTo(Patient::class);
    }

    // * Un RDV appartient a un medecin
    public function medecin ()
    {
        return $this->belongsTo(Medecin::class);
    }
}
