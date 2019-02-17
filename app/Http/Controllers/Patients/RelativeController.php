<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RelativeRequest;
use App\relative;

class RelativeController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param Relative $entity
     */
    public function __construct(Relative $entity)
    {
        parent::__construct($entity);

        $this->crud = 'patients.relatives';

        $this->middleware(function ($request, $next) {
            $this->id = $request->relative;
            $patient = \App\Patient::find($request->patient);

            if ( !is_null($patient) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.patients'),
                    'subtitle' => __('app.titles.patient.relatives', ['name' => $patient->full_name]),
                ]]);
                $request->request->add(['patient_id' => $patient->id]);
                $this->model = $patient->relatives->sortBy('name');

                return $next($request);
            }

            return abort(404);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return parent::show($this->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RelativeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RelativeRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RelativeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(RelativeRequest $request)
    {
        return parent::updateBase($request,$this->id);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return parent::destroy($this->id);
    }
}
