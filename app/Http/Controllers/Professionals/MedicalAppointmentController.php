<?php

namespace App\Http\Controllers\Professionals;

use App\Http\Controllers\BaseController;
use App\Http\Requests\MedicalAppointmentRequest;
use App\MedicalAppointment;
use Illuminate\Http\Request;

class MedicalAppointmentController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param MedicalAppointment $entity
     */
    public function __construct(MedicalAppointment $entity)
    {
        parent::__construct($entity);

        $this->crud = 'professionals.medical_appointments';

        $this->middleware(function ($request, $next) {
            $this->id = $request->medical_appointment;
            $professional = \App\Professional::find($request->professional);

            if ( !is_null($professional) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.professionals'),
                    'subtitle' => __('app.titles.patient.medical_appointments', ['name' => $professional->select_value]),
                    'tools' => [
                        'create' => true,
                        'reload' => false,
                    ],
                    'table' => [
                        'check' => false,
                        'fields' => ['date', 'patient_id', 'social_security_entity_id', 'state'],
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
     * @param MedicalAppointmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalAppointmentRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MedicalAppointmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalAppointmentRequest $request)
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
