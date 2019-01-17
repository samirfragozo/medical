<?php

namespace App\Http\Controllers;

use App\MedicalAppointment;
use Illuminate\Http\Request;

class MedicalAppointmentController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param MedicalAppointment $entity
     */
    public function __construct(MedicalAppointment $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->orderBy('created_at');
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
     * @param MedicalAppointment $medicalAppointment
     * @return void
     */
    public function edit(MedicalAppointment $medicalAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param MedicalAppointment $medicalAppointment
     * @return void
     */
    public function update(Request $request, MedicalAppointment $medicalAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MedicalAppointment $medicalAppointment
     * @return void
     */
    public function destroy(MedicalAppointment $medicalAppointment)
    {
        //
    }
}
