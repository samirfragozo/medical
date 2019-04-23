<?php

namespace App\Http\Controllers\Nurse;

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

        $this->middleware(function ($request, $next) {
            $this->id = $request->fluid;
            $turn = Turn::where([['id', $request->turn], ['nurse_id', Auth::user()['model_id']]])->first();

            if ( !is_null($turn) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.nurse.turns'),
                    'subtitle' => __('app.titles.nurse.turn_fluids', ['name' => $turn->full_name]),
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

    /**
     * Store a newly created resource in storage.
     *
     * @param TurnFluidRequest $request
     * @return Response
     */
    public function store(TurnFluidRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TurnFluidRequest $request
     * @return Response
     */
    public function update(TurnFluidRequest $request)
    {
        return parent::updateBase($request, $this->id);
    }
}
