<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        return view('dashboard');
    }
    public function patient()
    {
        return view('dashboarduser');
    }
    public function medecin()
    {
        return view('dashboardmedecin');
    }
    public function intermediaire ()
    {
        return view('dashboardinter');
    }
}
