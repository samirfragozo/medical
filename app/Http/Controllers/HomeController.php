<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Redirects the user according to his role.
     *
     * @return Response
     */
    protected function index()
    {
        if (Auth::user()->hasRole('nurse')) return redirect()->route('nurse.turns.index');
        else if (Auth::user()->hasRole('professional')) return redirect()->route('professional.medical_appointments.index');
        else if (Auth::user()->hasRole('admin')) return redirect()->route('patients.index');
        else return abort(404);
    }
}
