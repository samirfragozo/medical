<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TurnNoteRequest;
use App\Turn;
use App\TurnCure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TurnCureController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param TurnCure $entity
     */
    public function __construct(TurnCure $entity)
    {
        parent::__construct($entity);

        $this->middleware(function ($request, $next) {
            $this->id = $request->cure;
            $turn = Turn::where([['id', $request->turn], ['nurse_id', Auth::user()['model_id']]])->first();

            if ( !is_null($turn) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.nurse.turns'),
                    'subtitle' => __('app.titles.nurse.turn_cures', ['name' => $turn->full_name]),
                ]]);
                $request->request->add(['turn_id' => $turn->id]);
                $this->model = $turn->cures->sortByDesc('start');

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
     * @param TurnNoteRequest $request
     * @return Response
     */
    public function store(TurnNoteRequest $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TurnNoteRequest $request
     * @return Response
     */
    public function update(TurnNoteRequest $request)
    {
        return parent::updateBase($request, $this->id);
    }
}
