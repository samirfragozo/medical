<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\BaseController;
use App\Http\Requests\MedicalAppointmentRequest;
use App\MedicalAppointment;
use App\Professional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

        $this->crud = 'professional.medical_appointments';

        $this->middleware(function ($request, $next) {
            $professional = Professional::find(Auth::user()['model_id']);

            if ( !is_null($professional) ) {
                $request->request->add(['data' => [
                    'tools' => [
                        'create' => false,
                        'reload' => true,
                    ],
                    'table' => [
                        'check' => false,
                        'fields' => ['date', 'patient_id', 'state'],
                        'active' => false,
                        'actions' => true,
                    ],
                    'form' => [
                        [
                            'name' => 'date',
                            'type' => 'datetime',
                        ],
                        [
                            'name' => 'observations',
                            'type' => 'textarea',
                        ],
                        [
                            'name' => 'patient_id',
                            'type' => 'select_reload',
                        ],
                    ],
                ]]);
                $request->request->add(['professional_id' => $professional->id]);
                $this->model = $professional->medical_appointments->sortByDesc('date');

                return $next($request);
            }

            return abort(404);
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MedicalAppointmentRequest $request
     * @return Response
     */
    public function update(MedicalAppointmentRequest $request)
    {
        return parent::updateBase($request,$this->id);
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
