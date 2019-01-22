<?php

namespace App\Http\Controllers;

use App\person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PersonController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Model $entity
     */
    public function __construct(Model $entity)
    {
        parent::__construct($entity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $entity = $this->entity->find($id);
        return response()->json(json_decode($entity, true) + json_decode($entity->person, true));
    }
}
