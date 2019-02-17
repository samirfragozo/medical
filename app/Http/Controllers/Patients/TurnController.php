<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TurnRequest;
use App\Turn;
use Illuminate\Http\Request;

class TurnController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param Turn $entity
     */
    public function __construct(Turn $entity)
    {
        parent::__construct($entity);

        $this->crud = 'patients.turns';

        $this->middleware(function ($request, $next) {
            $this->id = $request->turn;
            $patient = \App\Patient::find($request->patient);

            if ( !is_null($patient) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.patients'),
                    'subtitle' => __('app.titles.patient.turns', ['name' => $patient->full_name]),
                ]]);
                $request->request->add(['patient_id' => $patient->id]);
                $this->model = $patient->turns->sortByDesc('start');

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
     * @param TurnRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurnRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TurnRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(TurnRequest $request)
    {
        return parent::updateBase($request,$this->id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Request $request)
    {
        $medical_appointment = $this->entity::find($request->id);

        if ( is_null($medical_appointment) ) return abort(404);

        if ($request->state == 'CANCELADA' and $medical_appointment->state == 'PENDIENTE') {
            $medical_appointment->state = $request->state;
            $medical_appointment->save();
        }

        return response()->json([
            'message' => __('app.messages.turns.' . $medical_appointment->state),
        ]);
    }
}
