<?php

namespace App\Http\Controllers;

use App\ProfessionalType;
use Illuminate\Http\Request;

class ProfessionalTypeController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param ProfessionalType $entity
     */
    public function __construct(ProfessionalType $entity)
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
     * @param ProfessionalType $professionalType
     * @return void
     */
    public function edit(ProfessionalType $professionalType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param ProfessionalType $professionalType
     * @return void
     */
    public function update(Request $request, ProfessionalType $professionalType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProfessionalType $professionalType
     * @return void
     */
    public function destroy(ProfessionalType $professionalType)
    {
        //
    }
}
