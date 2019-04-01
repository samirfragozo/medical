<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalRequest;
use App\Professional;
use Illuminate\Http\Response;

class ProfessionalController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param Professional $entity
     */
    public function __construct(Professional $entity)
    {
        parent::__construct($entity, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfessionalRequest $request
     * @return Response
     */
    public function store(ProfessionalRequest $request)
    {
        return parent::storeBase($request, false);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfessionalRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ProfessionalRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }
}
