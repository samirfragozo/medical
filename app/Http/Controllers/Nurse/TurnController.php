<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\BaseController;
use App\Nurse;
use App\Turn;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

        $this->crud = 'nurse.turns';

        $this->middleware(function ($request, $next) {
            $nurse = Nurse::find(Auth::user()['model_id']);

            if ( !is_null($nurse) ) {
                $request->request->add(['data' => [
                    'tools' => [
                        'create' => false,
                        'reload' => true,
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function statusUpdate(Request $request)
    {
        $turn = $this->entity::find($request->input('id'));

        if ( is_null($turn) ) return abort(404);

        if ($request->input('state') == __('app.selects.turns.state_next.' . $turn->state)) {
            $turn->state = $request->input('state');
            $turn->save();
        }

        return response()->json([
            'message' => __('app.messages.turns.' . $turn->state),
        ]);
    }
}
