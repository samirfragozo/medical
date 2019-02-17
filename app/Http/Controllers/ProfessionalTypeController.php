<?php

namespace App\Http\Controllers;

use App\ProfessionalType;
use Illuminate\Http\Request;

class ProfessionalTypeController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param ProfessionalType $entity
     */
    public function __construct(ProfessionalType $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->orderBy('name');
    }

}
