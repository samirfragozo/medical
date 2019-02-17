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

    // Medical appointments
    Route::resource('medical_appointments', 'MedicalAppointmentController', ['except' => ['create', 'edit']]);
    Route::put('medical_appointments', 'MedicalAppointmentController@statusUpdate');

    // Turns
    Route::resource('turns', 'TurnController', ['except' => ['create', 'edit']]);
    Route::put('turns', 'TurnController@statusUpdate');

    // Patients
    Route::resource('patients', 'PatientController', ['except' => ['create', 'edit']]);
    Route::post('patients/{patient}', 'PatientController@active');

    // Patients - Medical appointments
    Route::resource('patients/{patient}/medical_appointments', 'Patients\MedicalAppointmentController', [
        'except' => ['create', 'edit', 'destroy'],
        'as' => 'patients_medical_appointments'
    ]);
    Route::put('patients/{patient}/medical_appointments', 'Patients\MedicalAppointmentController@statusUpdate');

    // Patients - Relatives
    Route::resource('patients/{patient}/relatives', 'Patients\RelativeController', ['except' => ['create', 'edit']]);

    // Patients - Turns
    Route::resource('patients/{patient}/turns', 'Patients\TurnController', [
        'except' => ['create', 'edit'],
        'as' => 'patients_turns'
    ]);
    Route::put('patients/{patient}/turns', 'Patients\TurnController@statusUpdate');

    // Professionals
    Route::resource('professionals', 'ProfessionalController', ['except' => ['create', 'edit']]);
    Route::post('professionals/{professional}', 'ProfessionalController@active');

    // Professionals - Medical appointments
    Route::resource('professionals/{professional}/medical_appointments', 'Professionals\MedicalAppointmentController', [
        'except' => ['create', 'edit', 'destroy'],
        'as' => 'professionals_medical_appointments'
    ]);
    Route::put('professionals/{professional}/medical_appointments', 'Professionals\MedicalAppointmentController@statusUpdate');

    // Nurses
    Route::resource('nurses', 'NurseController', ['except' => ['create', 'edit']]);
    Route::post('nurses/{nurse}', 'NurseController@active');

    // Nurses - Turns
    Route::resource('nurses/{nurse}/turns', 'Nurses\TurnController', [
        'except' => ['create', 'edit'],
        'as' => 'nurses_turns'
    ]);
    Route::put('nurses/{nurse}/turns', 'Nurses\TurnController@statusUpdate');



    Route::resource('professional_specialties', 'ProfessionalSpecialtyController', ['except' => ['create', 'edit']]);

    Route::resource('professional_types', 'ProfessionalTypeController', ['except' => ['create', 'edit']]);

    Route::resource('supplies', 'SupplyController', ['except' => ['create', 'edit']]);

    Route::get('select', function (Request $request)
    {
        $request->request->add(['data' => Base::select($request->input('name'))]);

        return response()->json($request);
    })->middleware('ajax');
});
