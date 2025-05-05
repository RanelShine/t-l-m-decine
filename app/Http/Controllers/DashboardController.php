<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Intermediaire;

use Illuminate\Http\Request;
use view;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = Patient::with('user')->get(); // Récupère les patients avec la relation "user"
    
        return view('dashboard.dashboard', compact('patients'));
    }
    public function patient()
    {
        return view('dashboard.dashboarduser');
    }
    public function medecin()
    {
        return view('dashboard.dashboardmedecin');
    }
    public function intermediaire ()
    {
        return view('dashboard.dashboardinter');
    }

    
}
