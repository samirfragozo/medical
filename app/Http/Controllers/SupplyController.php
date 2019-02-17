<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;

class SupplyController extends BaseController
{
    /**
     * Create a controller instance.
     *
     * @param Supply $entity
     */
    public function __construct(Supply $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->orderBy('name');
    }
}
