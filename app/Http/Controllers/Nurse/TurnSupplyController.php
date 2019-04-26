<?php

namespace App\Http\Controllers\Nurse;

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

        $this->middleware(function ($request, $next) {
            $this->id = $request->supply;
            $turn = Turn::where([['id', $request->turn], ['nurse_id', Auth::user()['model_id']]])->with('supplies.supply')->first();

            if ( !is_null($turn) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.nurse.turns'),
                    'subtitle' => __('app.titles.nurse.turn_supplies', ['name' => $turn->full_name]),
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

    /**
     * Store a newly created resource in storage.
     *
     * @param TurnSupplyRequest $request
     * @return Response
     */
    public function store(TurnSupplyRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TurnSupplyRequest $request
     * @return Response
     */
    public function update(TurnSupplyRequest $request)
    {
        return parent::updateBase($request, $this->id);
    }
}
