<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurnRequest;
use App\Turn;
use Illuminate\Http\Request;

class TurnController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Turn $entity
     */
    public function __construct(Turn $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->orderBy('start', 'desc');
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TurnRequest $request, int $id)
    {
        return parent::updateBase($request,$id);
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
