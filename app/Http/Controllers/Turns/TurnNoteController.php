<?php

namespace App\Http\Controllers\Turns;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TurnNoteRequest;
use App\Turn;
use App\TurnNote;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TurnNoteController extends BaseController
{
    private $id;

    /**
     * Create a controller instance.
     *
     * @param TurnNote $entity
     */
    public function __construct(TurnNote $entity)
    {
        parent::__construct($entity);

        $this->crud = 'turns.turn_notes';

        $this->middleware(function ($request, $next) {
            $this->id = $request->note;
            $turn = Turn::find($request->turn);

            if ( !is_null($turn) ) {
                $request->request->add(['data' => [
                    'title' => __('app.titles.turns'),
                    'subtitle' => __('app.titles.nurse.turn_notes', ['name' => $turn->full_name]),
                    'tools' => [
                        'create' => false,
                        'reload' => true,
                        'export' => true,
                    ],
                ]]);
                $request->request->add(['turn_id' => $turn->id]);
                $this->model = $turn->notes->sortByDesc('start');

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
