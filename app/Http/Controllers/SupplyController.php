<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplyRequest;
use App\Supply;

class SupplyController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Supply $entity
     */
    public function __construct(Supply $entity)
    {
        parent::__construct($entity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SupplyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplyRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SupplyRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplyRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }
}
