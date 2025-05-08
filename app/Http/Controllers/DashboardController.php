<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Medecin;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Services\ZoomService;
use App\Mail\RendezVousConfirme;
use App\Mail\RendezVousConfirmeMedecin;

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
            'date_rendezvous' => 'required|date|after_or_equal:today',
            'heure'           => 'required',
            'motif'           => 'required|string',
            'localisation'    => 'required|string',
        ]);

        $patient = Auth::user()->patient ?? null;
        if (!$patient) {
            return back()->with('error', 'Utilisateur non autorisé.');
        }

        RendezVous::create([
            'patient_id'      => $patient->id,
            'date_rendezvous' => $request->date_rendezvous,
            'heure'           => $request->heure,
            'motif'           => $request->motif,
            'localisation'    => $request->localisation,
            'status'          => 'en_attente',
            'medecin_id'      => null,
        ]);

        return back()->with('success', 'Rendez-vous pris avec succès.');
    }

    public function myRendezvous()
    {
        $rvs = RendezVous::with('patient.user')
            ->where('medecin_id', Auth::user()->medecin->id)
            ->orderBy('date_rendezvous', 'asc')
            ->get();

        return view('rendezvous.my', compact('rvs'));
    }

    public function confirm(Request $request, $id, ZoomService $zoom)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        $rv = RendezVous::findOrFail($id);

        if ($rv->status !== 'affecté') {
            return back()->with('error', 'Le rendez-vous ne peut être confirmé que s’il est affecté.');
        }

        $rv->status = 'confirmé';
        $rv->medecin_id = $request->medecin_id;

        // Crée la réunion Zoom
        $dateTime = $rv->date_rendezvous->setTimeFromTimeString($rv->heure);
        $rv->zoom_link = $zoom->createMeeting('Consultation médicale', $dateTime);

        $rv->save();

        // Envoie l'email
// Envoie au patient
Mail::to($rv->patient->user->email)->send(new RendezVousConfirme($rv));

// Envoie au médecin
Mail::to($rv->medecin->user->email)->send(new RendezVousConfirmeMedecin($rv));



        return back()->with('success', 'Rendez-vous confirmé et lien Zoom envoyé.');
    }

    public function confirmerParAssistant(Request $request, $id)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        $rdv = RendezVous::findOrFail($id);

        if ($rdv->status === 'en_attente') {
            $rdv->status = 'affecté';
            $rdv->medecin_id = $request->medecin_id;
            $rdv->save();

            return back()->with('success', 'Rendez-vous affecté au médecin.');
        }

        return back()->with('error', 'Le rendez-vous ne peut pas être confirmé.');
    }
}
