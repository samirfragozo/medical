<?php

namespace App\Http\Controllers;

use App\ProfessionalSpecialty;
use Illuminate\Http\Request;

class ProfessionalSpecialtyController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param ProfessionalSpecialty $entity
     */
    public function __construct(ProfessionalSpecialty $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->orderBy('created_at');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProfessionalSpecialty $professionalSpecialty
     * @return void
     */
    public function edit(ProfessionalSpecialty $professionalSpecialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param ProfessionalSpecialty $professionalSpecialty
     * @return void
     */
    public function update(Request $request, ProfessionalSpecialty $professionalSpecialty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProfessionalSpecialty $professionalSpecialty
     * @return void
     */
    public function destroy(ProfessionalSpecialty $professionalSpecialty)
    {
        //
    }
}
