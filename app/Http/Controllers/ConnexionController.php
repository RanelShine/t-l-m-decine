<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'user_type' => 'required|in:patient,medecin',
        ]);

        if ($request->user_type == 'patient') {
            if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard.patient');
            }
        } else {
            if (Auth::guard('medecin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard.medecin');
            }
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

}
