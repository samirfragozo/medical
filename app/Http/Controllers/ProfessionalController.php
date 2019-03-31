<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalRequest;
use App\Professional;

class ProfessionalController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param Professional $entity
     */
    public function __construct(Professional $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->with('professional_specialty.professional_type')->orderBy('name');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfessionalRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionalRequest $request)
    {
        return parent::storeBase($request, false, true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfessionalRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionalRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }
}
