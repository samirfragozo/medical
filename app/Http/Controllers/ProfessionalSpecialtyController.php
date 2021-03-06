<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalSpecialtyRequest;
use App\ProfessionalSpecialty;
use Illuminate\Http\Response;

class ProfessionalSpecialtyController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param ProfessionalSpecialty $entity
     */
    public function __construct(ProfessionalSpecialty $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->with('professional_type')->orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfessionalSpecialtyRequest $request
     * @return Response
     */
    public function store(ProfessionalSpecialtyRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfessionalSpecialtyRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ProfessionalSpecialtyRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }
}
