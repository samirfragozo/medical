<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalAppointmentRequest;
use App\MedicalAppointment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalAppointmentController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param MedicalAppointment $entity
     */
    public function __construct(MedicalAppointment $entity)
    {
        parent::__construct($entity);

        $this->middleware(function ($request, $next) {
            $request->request->remove('diagnosis');
            $this->model = $this->entity->with('professional')->orderByDesc('date')->get();

            return $next($request);
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MedicalAppointmentRequest $request
     * @return Response
     */
    public function store(MedicalAppointmentRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function statusUpdate(Request $request)
    {
        $medical_appointment = $this->entity::find($request->input('id'));

        if ( is_null($medical_appointment) ) return abort(404);

        if ($request->input('state') == 'CANCELADA' and $medical_appointment->state == 'PENDIENTE') {
            $medical_appointment->state = $request->input('state');
            $medical_appointment->save();
        }

        return response()->json([
            'message' => __('app.messages.medical_appointments.' . $medical_appointment->state),
        ]);
    }
}
