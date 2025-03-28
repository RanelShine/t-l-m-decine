<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedicale extends Model
{
    use HasFactory;

    public function patient ()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medecin ()
    {
        return $this->belongsToMany(Medecin::class);
    }
}
