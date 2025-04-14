<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['user_id','Date_de_Naissance'];

    // * Un Patient appartient a un User
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    // * Un Patient peut avoir plusieurs dossiers medicaux
    public function dossiermedicale ()
    {
        return $this->hasOne(DossierMedicale::class);
    }

    // * Un patient peut avoir plusieurs RDV 
    public function rendezvouses ()
    {
        return $this->hasMany(RendezVous::class);
    }

    // * Un patient peut avoir plusieurs ordonnances
    public function ordonnance ()
    {
        return $this->hasMany(Ordonnance::class);
    } 

    public $timestamps = false;
}
