<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalTypeRequest;
use App\ProfessionalType;
use Illuminate\Http\Response;

class ProfessionalTypeController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param ProfessionalType $entity
     */
    public function __construct(ProfessionalType $entity)
    {
        parent::__construct($entity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfessionalTypeRequest $request
     * @return Response
     */
    public function store(ProfessionalTypeRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfessionalTypeRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ProfessionalTypeRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }
}
