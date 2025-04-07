<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        return view('dashboard.dashboard');
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
