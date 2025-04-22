<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedicale extends Model
{
    use HasFactory;

    // * Un dossier medical appartient a un patient
    public function patient ()
    {
        return $this->belongsTo(Patient::class);
    }

    // * Un dossier medical peut etre lié à plusieurs medecin
    public function medecin ()
    {
        return $this->belongsToMany(Medecin::class);
    }
}
