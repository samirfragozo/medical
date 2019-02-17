<?php

namespace App\Http\Controllers\Nurses;

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

        $this->crud = 'nurses.turns';

        $this->middleware(function ($request, $next) {
            $this->id = $request->turn;
            $nurse = \App\Nurse::find($request->nurse);

            if ( !is_null($nurse) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.nurses'),
                    'subtitle' => __('app.titles.patient.turns', ['name' => $nurse->select_value]),
                    'tools' => [
                        'create' => true,
                        'reload' => false,
                    ],
                    'table' => [
                        'check' => false,
                        'fields' => ['start', 'end', 'patient_id', 'state'],
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
                            'name' => 'patient_id',
                            'type' => 'select_reload',
                        ],
                    ],
                ]]);
                $request->request->add(['nurse_id' => $nurse->id]);
                $this->model = $nurse->turns->sortByDesc('start');

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
        $turn = $this->entity::find($request->input('id'));

        if ( is_null($turn) ) return abort(404);

        if ($request->input('state') == 'CANCELADA' and $turn->state == 'PENDIENTE') {
            $turn->state = $request->input('state');
            $turn->save();
        }

        return response()->json([
            'message' => __('app.messages.turns.' . $turn->state),
        ]);
    }
}
