<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['specialite'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function dossiermedicale ()
    {
        return $this->belongsToMany(DossierMedicale::class);
    }

    public function rendezvouses ()
    {
        return $this->hasMany(RendezVous::class);
    }

    public function ordonnance ()
    {
        return $this->hasMany(Ordonnance::class);
    }
}
