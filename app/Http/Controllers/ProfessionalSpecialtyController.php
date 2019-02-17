<?php

namespace App\Http\Controllers;

use App\ProfessionalSpecialty;
use Illuminate\Http\Request;

class ProfessionalSpecialtyController extends BaseController
{
    /**
     * ProfessionalController constructor.
     * @param ProfessionalSpecialty $entity
     */
    public function __construct(ProfessionalSpecialty $entity)
    {
        parent::__construct($entity);
        $this->model = $this->entity->with('professional_type')->orderBy('name');
    }
}
