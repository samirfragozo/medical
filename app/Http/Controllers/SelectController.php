<?php

namespace App\Http\Controllers;

use App\Utils\Base;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $request->request->add(['data' => Base::select($request->input('name'))]);

        return response()->json($request);
    }
}
