<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurnRequest;
use App\Turn;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $this->model = $this->entity->with('nurse')->orderBy('start', 'desc')->get();
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
     * @param int $id
     * @return Response
     */
    public function update(TurnRequest $request, int $id)
    {
        return parent::updateBase($request,$id);
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
