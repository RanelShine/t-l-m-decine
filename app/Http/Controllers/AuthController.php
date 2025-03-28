<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Afficher les formulaires d'inscription
    public function showPatientInscription()
    {
        return view('User.patientInscriptions');
    }

    public function showMedecinInscription()
    {
        return view('User.medecinInscription');
    }

    public function showLoginForm ()
    {
        return view('User.connexion');
    }

    // Inscription patient
    public function registerPatient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Compte patient créé.');
    }

    // Inscription médecin
    public function registerMedecin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:medecins',
            'phone' => 'required',
            'speciality' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        Medecin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Compte médecin créé.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
