<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendezvous';

    protected $fillable = [
        'patient_id',
        'medecin_id',
        'date_rendezvous',
        'heure',
        'localisation',
        'motif',
        'status',
    ];

    protected $casts = [
        'date_rendezvous' => 'date',       // convertit en Carbon (date only)
        'heure'           => 'datetime:H:i', // convertit en Carbon (heure seule, mais tu peux aussi le laisser en string)
    ];
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
