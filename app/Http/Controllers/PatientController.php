<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Patient;
use Illuminate\Http\Response;

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
        $this->model = $this->entity->with('social_security_entity')->orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return Response
     */
    public function store(PatientRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PatientRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PatientRequest $request, int $id)
    {
        $request['allergies'] = isset($request['allergies']) ? 1 : 0;
        $request['medication_allergies'] = isset($request['medication_allergies']) ? 1 : 0;
        $request['medicines'] = isset($request['medicines']) ? 1 : 0;

        return parent::updateBase($request, $id);
    }
}
