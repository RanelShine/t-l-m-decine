<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\MedecinFormRequest;
use App\Http\Requests\PatientFormRequest;

class AuthController extends Controller
{
    // * Afficher les formulaires d'inscription
    public function showPatientInscription()
    {
        $patient = new Patient();
        $user = new User();
        return view('Patient.patientInscriptions', [
            'patient' => $patient,
            'user' => $user,
        ]);
    }

    public function showMedecinInscription()
    {
        $medecin = new Medecin();
        $user = new User(); 
        return view('Medecin.medecinInscription', [
            'medecin' => $medecin,
            'user' => $user,
        ]);
    }

    // * Inscription patient
    public function registerPatient(UserFormRequest $userRequest, PatientFormRequest $patientRequest)
    {
        DB::beginTransaction();
        try 
        {
            // * Creation de l'utilisateur
            User::create([
                'nom' => $userRequest->name,
                'email' => $userRequest->email,
                'telephone' => $userRequest->phone,
                'password' => Hash::make($userRequest->password),
            ]);

            // * Creation du patient associé à l'utilisateur
            Patient::create([
                'user_id' => User::where('email', $userRequest->email)->first()->id,
                'Date_de_Naissance' => $patientRequest->Date_de_Naissance,
            ]);

            DB::commit();

            return redirect()->route('home.login')->with('success', 'Compte patient créé.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erreur lors de la création du compte patient.')->withInput();
        }
    }

    // * Inscription médecin
    public function registerMedecin(UserFormRequest $userRequest, MedecinFormRequest $medecinRequest)
    {

        DB::beginTransaction();
        try 
        {
            // * Creation de l'utilisateur
        User::create([
            'nom' => $userRequest->name,
            'email' => $userRequest->email,
            'telephone' => $userRequest->phone,
            'password' => Hash::make($userRequest->password),
        ]);

        // * Creation du médécin associé à l'utilisateur
        Medecin::create([
            'user_id' => User::where('email', $userRequest->email)->first()->id,
            'specialite' => $medecinRequest->specialite,
        ]);

        DB::commit();


        return redirect()->route('home.login')->with('success', 'Compte médecin créé.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erreur lors de la création du compte médecin.')->withInput();
        }
        
    }


    // * Connexion

    public function showLoginForm ()
    {
        $user = new User();
        return view('connexion',[
            'user' => $user,
        ]);
    }

    public function login(LoginFormRequest $loginRequest)
    {
        $credentials = $loginRequest->validated();
        if (Auth::attempt($credentials))
        {
            $loginRequest->session()->regenerate();
            $user = Auth::user();

            if($loginRequest->user_type == 'patient')
            {
                return redirect()->route('dashboard.patient')->with('success', 'Bienvenue Patient');
            }
            elseif($loginRequest->user_type == 'medecin')
            {
                return redirect()->route('dashboard.medecin')->with('success', 'Bienvenue Médecin');
            }
            elseif($loginRequest->user_type == 'administrateur')
            {
                return redirect()->route('dashboard.administrateur')->with('success', 'Bienvenue Administrateur');
            }
            elseif($loginRequest->user_type == 'superadmin')
            {
                return redirect()->route('dashboard.secretaire')->with('success', 'Bienvenue Super Administrateur');
            }

            return redirect()->route('home.login')->with('error', 'Type d\'utilisateur non reconnu.');
        }
        return back()->withErrors([
            'email' => "Verifier votre adresse mail",
            'password' => "Verifier votre mot de passe",
        ])->onlyInput('email');

    }

    // * Déconnexion

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
