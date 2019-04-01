<?php

namespace App\Http\Controllers;

use App\Http\Requests\NurseRequest;
use App\Nurse;
use Illuminate\Http\Response;

class NurseController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Nurse $entity
     */
    public function __construct(Nurse $entity)
    {
        parent::__construct($entity, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NurseRequest $request
     * @return Response
     */
    public function store(NurseRequest $request)
    {
        return parent::storeBase($request, false);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NurseRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NurseRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }
}
