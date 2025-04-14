<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\MedecinFormRequest;
use App\Http\Requests\PatientFormRequest;

class AuthController extends Controller
{
    // ! Afficher les formulaires d'inscription
    public function showPatientInscription()
    {
        $patient = new Patient();
        $user = new User();
        return view('Patient.patientInscriptions',[
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

    // ! Inscription patient
    public function registerPatient(UserFormRequest $userRequest, PatientFormRequest $patientRequest)
    {
        DB::beginTransaction();
        try {
            // * Vérifie d'abord si l'email existe déjà
            if (User::where('email', $userRequest->email)->exists()) {
                return redirect()->back()->with('error', 'Cet email est déjà utilisé.')->withInput();
            }
    
            // * Création de l'utilisateur
            $user = User::create([
                'name' => $userRequest->name,
                'email' => $userRequest->email,
                'telephone' => $userRequest->telephone,
                'password' => Hash::make($userRequest->password),
            ]);
    
            // * Création du patient lié a ce user 
            Patient::create([
                'user_id' => $user->id,
                'Date_de_Naissance' => $patientRequest->Date_de_Naissance,
            ]);

            DB::commit();

            // * Assignation du rôle a ce user
            if (Role::where('name', 'patient')->exists()) {
                $user->assignRole('patient');
            } else {
                throw new \Exception("Le rôle 'patient' n'existe pas.");
            }


            // * Redirection vers la page de connexion avec un message de succès
            return redirect()->route('home.login')->with('success', 'Inscription réussie. Veuillez vous connecter.');
            
        } catch (\Exception $e) {
            // * Annulation de la transaction en cas d'erreur et retour a la page d'inscription
            DB::rollback();
            // * Log l'erreur pour le débogage
            Log::error('Erreur inscription patient: '.$e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la cretaion du compte patient: '.$e->getMessage())->withInput();
        }
    }

    // ! Inscription médecin
    public function registerMedecin(UserFormRequest $userRequest, MedecinFormRequest $medecinRequest)
    {

        DB::beginTransaction();
        try 
        {
            // * Creation de l'utilisateur
        $user = User::create([
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'telephone' => $userRequest->telephone,
            'password' => Hash::make($userRequest->password),
        ]);

        // * Creation du médécin associé a cet utilisateur
        Medecin::create([
            'user_id' => $user->id,
            'specialite' => $medecinRequest->specialite,
        ]);

        DB::commit();

        // * Assignation du role a ce user
        if (Role::where('name', 'medecin')->exists()) {
            $user->assignRole('medecin');
        } else {
            throw new \Exception("Le rôle 'medecin' n'existe pas.");
        }
        
        // * Redirection vers la page de connexion avec un message de succès
        return redirect()->route('home.login')->with('success', 'Inscription réussie. Veuillez vous connecter.');
        } 
        catch (\Exception $e) 
        {
            // * Annulation de la transaction en cas d'erreur et retour a la page d'inscription
            DB::rollback();
            // * Log d'erreur pour le debogage
            Log::error('Erreur inscription medecin: '.$e->getMessage());
            return redirect()->back()->with('error', 'Une Erreur est survenue lors de la création du compte médecin: '.$e->getMessage())->withInput();
        }
        
    }


    // ! DRY creation des users (admin, super admin, assitant) avec leur role respectif
    private function createUserWithRole($name, $email, $telephone, $password, $roleName)
    {
        if (!Role::where('name', $roleName)->exists()) {
            throw new \Exception("Le rôle '$roleName' n'existe pas.");
        }

        $user = User::firstOrCreate([
            'email' => $email,
        ], [
            'name' => $name,
            'telephone' => $telephone,
            'password' => Hash::make($password),
        ]);

        $user->assignRole($roleName);
    }

    // ! Creation des Users avec leur role et persistance en BD
    public function create()
    {
        $this->createUserWithRole('super admin', 'superadmin@gmail.com', 699999999, 'superadmin123', 'super admin');
        $this->createUserWithRole('admin', 'admin@gmail.com', 654678321, 'admin123', 'admin');
        $this->createUserWithRole('assistant', 'assistant@gmail.com', 690856334, 'assistant123', 'assistant');
    }


    // !  Connexion
    public function showLoginForm ()
    { 
        $this->create();
        return view('connexion');
    }

    public function login(LoginFormRequest $loginRequest)
    {
        // * Vérification des identifiants
        $credentials = $loginRequest->validated();

        // * Garder l'utilisateur actif
        if (Auth::attempt($credentials))
        {
            $loginRequest->session()->regenerate();
            return redirect()->intended(route('home.index'));
        }
        return back()->withErrors([
            'email' => "Idetifiant Incorrect",
        ])->onlyInput('email');

    }

    // !  Déconnexion
    public function logout()
    {
        Auth::logout();
        return to_route('home.login')->with('success', 'Déconnexion réussie');
    }


}
