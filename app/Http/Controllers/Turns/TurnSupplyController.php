<?php

namespace App\Http\Controllers\Turns;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TurnSupplyRequest;
use App\Turn;
use App\TurnSupply;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TurnSupplyController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param TurnSupply $entity
     */
    public function __construct(TurnSupply $entity)
    {
        parent::__construct($entity);

        $this->crud = 'turns.turn_supplies';

        $this->middleware(function ($request, $next) {
            $this->id = $request->supply;
            $turn = Turn::where('id', $request->turn)->with('supplies.supply')->first();

            if ( !is_null($turn) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.turns'),
                    'subtitle' => __('app.titles.nurse.turn_supplies', ['name' => $turn->full_name]),
                    'tools' => [
                        'create' => false,
                        'reload' => true,
                        'export' => true,
                    ],
                ]]);
                $request->request->add(['turn_id' => $turn->id]);
                $this->model = $turn->supplies->sortByDesc('start');

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
