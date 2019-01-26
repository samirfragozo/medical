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

use App\Utils\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'verify' => true]);

Route::redirect('/', 'home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Home
    Route::redirect('home', 'patients')->name('home');

    Route::resource('medical_appointments', 'MedicalAppointmentController', ['except' => ['create', 'edit']]);

    Route::resource('patients', 'PatientController', ['except' => ['create', 'edit']]);
    Route::post('patients/{patient}', 'PatientController@active');
    Route::resource('patients/{patient}/medical_appointments', 'MedicalAppointmentController', [
        'except' => ['create', 'edit'],
        'as' => 'patients_medical_appointments'
    ]);
    Route::resource('patients/{patient}/relatives', 'RelativeController', ['except' => ['create', 'edit']]);
    Route::resource('patients/{patient}/turns', 'TurnController', ['except' => ['create', 'edit']]);

    Route::resource('professionals', 'ProfessionalController', ['except' => ['create', 'edit']]);

    Route::resource('professional_specialties', 'ProfessionalSpecialtyController', ['except' => ['create', 'edit']]);

    Route::resource('professional_types', 'ProfessionalTypeController', ['except' => ['create', 'edit']]);

    Route::resource('relatives', 'RelativeController', ['except' => ['create', 'edit']]);

    Route::resource('supplies', 'SupplyController', ['except' => ['create', 'edit']]);

    Route::resource('turns', 'TurnController', ['except' => ['create', 'edit']]);

    Route::get('select', function (Request $request)
    {
        $request->request->add(['data' => Base::select($request->input('name'))]);

        return response()->json($request);
    })->middleware('ajax');
});
