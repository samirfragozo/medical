<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;

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
     * @param Supply $supply
     * @return void
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Supply $supply
     * @return void
     */
    public function update(Request $request, Supply $supply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supply $supply
     * @return void
     */
    public function destroy(Supply $supply)
    {
        //
    }
}
