<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'verify' => true]);

Route::redirect('/', 'home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Home
    Route::redirect('home', 'patients')->name('home');

    Route::resource('patients', 'PatientController', ['except' => ['create', 'edit']]);

    Route::resource('professionals', 'ProfessionalController', ['except' => ['create', 'edit']]);

    Route::resource('relatives', 'RelativeController', ['except' => ['create', 'edit']]);

    Route::resource('medical_appointments', 'MedicalAppointmentController', ['except' => ['create', 'edit']]);
});
