<?php

namespace App\Http\Controllers;

use App\patient;
use Illuminate\Http\Request;

class PatientController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Patient $entity
     */
    public function __construct(Patient $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->with('person', 'social_security_entity')->orderBy('created_at');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\patient $patient
     * @return void
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\patient $patient
     * @return void
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient $patient
     * @return void
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
