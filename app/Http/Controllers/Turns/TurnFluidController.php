<?php

namespace App\Http\Controllers\Turns;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TurnFluidRequest;
use App\Turn;
use App\TurnFluid;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TurnFluidController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param TurnFluid $entity
     */
    public function __construct(TurnFluid $entity)
    {
        parent::__construct($entity);

        $this->crud = 'turns.turn_fluids';

        $this->middleware(function ($request, $next) {
            $this->id = $request->fluid;
            $turn = Turn::find($request->turn);

            if ( !is_null($turn) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.turns'),
                    'subtitle' => __('app.titles.nurse.turn_fluids', ['name' => $turn->full_name]),
                    'tools' => [
                        'create' => false,
                        'reload' => true,
                        'export' => true,
                    ],
                ]]);
                $request->request->add(['turn_id' => $turn->id]);
                $this->model = $turn->fluids->sortByDesc('start');

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
}
