<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\User;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use view;

class DashboardController extends Controller
{
    public function index()
{
    
    $patients = Patient::with('user')->get();
    $medecins = Medecin::with('user')->get();

    
    $rvs = [];
    if (Auth::user()->roles->contains('name', 'medecin')) {
        $rvs = RendezVous::with('patient.user')
                 ->where('medecin_id', Auth::user()->medecin->id)
                 ->orderBy('date_rendezvous', 'asc')
                 ->get();
    }

    
    return view('dashboard', compact('patients', 'medecins', 'rvs'));
}
    
    public function storeRendezVous(Request $request)
    {
        $request->validate([
            'medecin_id'       => 'required|exists:medecins,id',
            'date_rendezvous'  => 'required|date|after_or_equal:today',
            'heure'            => 'required',
            'motif'            => 'required|string',
        ]);

        RendezVous::create([
            'patient_id'      => Auth::user()->patient->id,
            'medecin_id'      => $request->medecin_id,
            'date_rendezvous' => $request->date_rendezvous,
            'heure'           => $request->heure,
            'motif'           => $request->motif,
        ]);

        return back()->with('success', 'Rendez-vous pris avec succès.');
    }

    

    public function myRendezvous()
    {
        // Récupère les rendez-vous pour le médecin connecté
        $rvs = \App\Models\RendezVous::with('patient.user')
                   ->where('medecin_id', auth()->user()->medecin->id)
                   ->orderBy('date_rendezvous', 'asc')
                   ->get();
    
        // Passe $rvs à la vue
        return view('rendezvous.my', compact('rvs'));
    }

    public function confirm(Request $request, $id)
    {
        $rv = RendezVous::findOrFail($id);
        $rv->status = 'done';
        $rv->save();

        return back()->with('success','Rendez-vous confirmé.');
    }

   
}
