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

Route::get('/', [HomeController::class, 'home']);



Route::get('inscription/patient', [AuthController::class, 'showPatientInscription'])->name('register.patient');
Route::post('inscription/patient', [AuthController::class, 'registerPatient'])->name('verification.register.patient');

Route::get('inscription/medecin', [AuthController::class, 'showMedecinInscription'])->name('register.medecin');
Route::post('inscription/medecin', [AuthController::class, 'registerMedecin'])->name('verification.register.medecin');

Route::get('connexion', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('connexion', [AuthController::class, 'login'])->name('verification.login');

Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboardu', [DashboardController::class, 'patient'])->name('dashboardu');
Route::get('dashboardm', [DashboardController::class, 'medecin'])->name('dashboardm');
Route::get('dashboardi', [DashboardController::class, 'intermediaire'])->name('dashboardi');
