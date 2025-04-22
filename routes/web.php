<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('home')->name('home.')->group(function()
{
    // * Page accueil
    Route::get('/', [HomeController::class, 'home'])->name('index');
    // * Incription Patient
    Route::get('inscription/patient', [AuthController::class, 'showPatientInscription'])->middleware('guest')->name('register.patient');
    Route::post('inscription/patient', [AuthController::class, 'registerPatient']);
    // * Incription Medecin
    Route::get('inscription/medecin', [AuthController::class, 'showMedecinInscription'])->middleware('guest')->name('register.medecin');
    Route::post('inscription/medecin', [AuthController::class, 'registerMedecin']);
    // * Connexion
    Route::get('connexion', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
    Route::post('connexion', [AuthController::class, 'login']);
    // * Deconnexion
    Route::delete('deconnexion', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function()
{
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

