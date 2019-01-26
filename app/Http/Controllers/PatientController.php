<?php

namespace App\Http\Controllers;

use App\patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PatientController extends PersonController
{
    /**
     * Create a controller instance.
     *
     * @param Patient $entity
     */
    public function __construct(Patient $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->with('person', 'social_security_entity')->orderBy('created_at');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequest $request
     * @param int $id
     * @return void
     */
    public function update(FormRequest $request, int $id)
    {
        parent::updateBase($request, $id);
    }
}
