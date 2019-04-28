<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TurnRequest;
use App\Patient;
use App\Turn;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            $patient = Patient::find($request->patient);

            if ( !is_null($patient) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.patients'),
                    'subtitle' => __('app.titles.patient.turns', ['name' => $patient->full_name]),
                    'tools' => [
                        'create' => true,
                        'reload' => true,
                        'export' => true,
                    ],
                    'table' => [
                        'check' => false,
                        'fields' => ['start', 'end', 'nurse_id', 'state'],
                        'active' => false,
                        'actions' => true,
                    ],
                    'form' => [
                        [
                            'name' => 'start',
                            'type' => 'datetime',
                        ],
                        [
                            'name' => 'end',
                            'type' => 'datetime',
                        ],
                        [
                            'name' => 'observations',
                            'type' => 'textarea',
                        ],
                        [
                            'name' => 'nurse_id',
                            'type' => 'select_reload',
                        ],
                    ],
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
     * @return Response
     */
    public function show(int $id)
    {
        return parent::show($this->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TurnRequest $request
     * @return Response
     */
    public function store(TurnRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TurnRequest $request
     * @return Response
     */
    public function update(TurnRequest $request)
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
        $turn = $this->entity::find($request->input('id'));

        if ( is_null($turn) ) return abort(404);

        if ($request->input('state') == 'CANCELADO' and $turn->state == 'PENDIENTE') {
            $turn->state = $request->input('state');
            $turn->save();
        }

        return response()->json([
            'message' => __('app.messages.turns.' . $turn->state),
        ]);
    }
}
