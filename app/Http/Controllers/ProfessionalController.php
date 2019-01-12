<?php

namespace App\Http\Controllers;

use App\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends BaseController
{

    /**
     * ProfessionalController constructor.
     * @param Professional $entity
     */
    public function __construct(Professional $entity)
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
     * @param Professional $professional
     * @return void
     */
    public function edit(Professional $professional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Professional $professional
     * @return void
     */
    public function update(Request $request, professional $professional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Professional $professional
     * @return void
     */
    public function destroy(professional $professional)
    {
        //
    }
}
