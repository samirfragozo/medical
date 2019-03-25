<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BaseController extends Controller
{
    protected $crud;
    protected $entity;
    protected $images;
    protected $model;
    protected $user;

    /**
     * Create a controller instance.
     *
     * @param Model $entity
     */
    protected function __construct(Model $entity)
    {
        $this->entity = $entity;
        $this->crud = $this->entity->getTable();
        $this->model = $this->entity->orderBy('name');
        $this->middleware('ajax')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    protected function index(Request $request)
    {
        if ($request->ajax()) return Datatables::of($this->model)->make(true);

        return view('app.index')->with(array_merge(array_merge([
            'crud' => $this->crud,
            'title' => __('app.titles.' . $this->crud),
            'subtitle' => __('app.titles.' . $this->crud),
        ], $this->entity->getLayout()), $request->input('data') ?? []));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    protected function show(int $id)
    {
        return response()->json($this->entity->find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest $request
     * @param bool $reload
     * @return \Illuminate\Http\Response
     */
    protected function storeBase(FormRequest $request, $reload = false)
    {
        $entity = $this->entity->create($request->all());

        return response()->json([
            'data' => $entity,
            'message' => __('base.messages.store', ['name' => $entity->fullName]),
            'reload' => $reload,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    protected function updateBase(FormRequest $request, int $id)
    {
        $entity = $this->entity->find($id)->fill($request->all());
        $entity->save();

        return response()->json([
            'data' => $entity,
            'message' => __('base.messages.update', ['name' => $entity->full_name]),
        ]);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = $this->entity->find($id);

        $entity->delete();

        return response()->json([
            'message' => __('base.messages.delete', ['name' => $entity->full_name]),
        ]);
    }

    /**
     * Change status the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    protected function active(Request $request, int $id)
    {
        $entity = $this->entity->find($id);
        $entity->active = $request->input('active');
        $entity->save();

        return response()->json([
            'message' => __('base.messages.active.' . $request->input('active'), ['name' => $entity->full_name]),
        ]);
    }
}
