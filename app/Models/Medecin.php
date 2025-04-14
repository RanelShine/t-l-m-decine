<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['user_id','specialite'];

    // * Un medecin appartient a un user
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    // * Un medecin peut etre lié à plusieurs dossiers medicaux
    public function dossiermedicale ()
    {
        return $this->belongsToMany(DossierMedicale::class);
    }

    // * Un medecin peut avoir plusieurs RDV
    public function rendezvouses ()
    {
        return $this->hasMany(RendezVous::class);
    }

    // * Un medecin peut avoir plusieurs ordonnances
    public function ordonnance ()
    {
        return $this->hasMany(Ordonnance::class);
    }

    public $timestamps = false;
}
