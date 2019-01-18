<?php

namespace App\Http\Controllers;

use App\relative;
use Illuminate\Http\Request;

class RelativeController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Relative $entity
     */
    public function __construct(Relative $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->with('person')->orderBy('name');
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
     * @param  \App\relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function edit(relative $relative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, relative $relative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function destroy(relative $relative)
    {
        //
    }
}
