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
            $professional = Professional::where('id', Auth::user()['model_id'])->with('medical_appointments.patient')->first();

            if ( !is_null($professional) ) {
                $request->request->add(['data' => [
                    'tools' => [
                        'create' => false,
                        'reload' => true,
                        'export' => true,
                    ],
                    'table' => [
                        'check' => false,
                        'fields' => ['date', 'patient_id', 'state'],
                        'active' => false,
                        'actions' => false,
                    ],
                    'form' => [
                        [
                            'name' => 'diagnosis',
                            'type' => 'textarea',
                        ],
                        [
                            'name' => 'date',
                            'type' => 'datetime',
                            'only-view' => true,
                        ],
                        [
                            'name' => 'observations',
                            'type' => 'textarea',
                            'only-view' => true,
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
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $medical_appointment = $this->entity::find($request->input('id'));

        if ( is_null($medical_appointment) ) return abort(404);

        if ($medical_appointment->state !== 'CANCELADA') {
            $request->validate([
                'diagnosis' => 'required|max:500',
            ]);
            $medical_appointment->diagnosis = $request->input('diagnosis');
            $medical_appointment->state = 'ATENDIDA';

            $medical_appointment->save();

            return response()->json([
                'data' => $medical_appointment,
                'message' => __('app.messages.medical_appointments.ATENDIDA'),
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => __('app.messages.medical_appointments.update'),
            ]);
        }

    }
}
