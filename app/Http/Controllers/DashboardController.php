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

    if (Auth::user()->roles->contains('name', 'assistant')) {
        $rvs = RendezVous::with('patient.user')
                ->orderBy('date_rendezvous', 'asc')
                ->get();
    }
    
    return view('dashboard', compact('patients', 'medecins', 'rvs'));
}
    
public function storeRendezVous(Request $request)
{
    $request->validate([
        'date_rendezvous'  => 'required|date|after_or_equal:today',
        'heure'            => 'required',
        'motif'            => 'required|string',
        'localisation'     => 'required|string',
    ]);

    // Vérification de l'authentification
    $patient = Auth::user()->patient ?? null;
    if (!$patient) {
        return back()->with('error', 'Utilisateur non autorisé.');
    }

    // Création du rendez-vous
    RendezVous::create([
        'patient_id'      => $patient->id,
        'date_rendezvous' => $request->date_rendezvous,
        'heure'           => $request->heure,
        'motif'           => $request->motif,
        'localisation'    => $request->localisation,
        'status'          => 'en_attente', // explicite au cas où
        'medecin_id'      => null, // Pas de médecin au départ
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
    $request->validate([
        'medecin_id' => 'required|exists:medecins,id',
    ]);

    $rv = RendezVous::findOrFail($id);

    if ($rv->status === 'affecté') {
        $rv->status = 'confirmé';
        $rv->medecin_id = $request->medecin_id;
        $rv->save();

        return back()->with('success', 'Rendez-vous confirmé par le médecin.');
    }

    return back()->with('error', 'Le rendez-vous ne peut être confirmé que s’il est affecté.');
}


public function confirmerParAssistant(Request $request, $id)
{
    $request->validate([
        'medecin_id' => 'required|exists:medecins,id',
    ]);

    $rdv = Rendezvous::findOrFail($id);

    if ($rdv->status === 'en_attente') {
        $rdv->status = 'affecté';
        $rdv->medecin_id = $request->medecin_id;
        $rdv->save();

        return back()->with('success', 'Rendez-vous confirmé par l’assistant.');
    }

    return back()->with('error', 'Le rendez-vous ne peut pas être confirmé.');
}



   
}
