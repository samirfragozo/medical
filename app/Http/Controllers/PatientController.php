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
}
