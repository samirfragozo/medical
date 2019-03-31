<?php

namespace App\Http\Requests;

/**
 * @property mixed id
 */
class ProfessionalSpecialtyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:12|unique:professional_specialties,code,' . $this->id,
            'name' => 'required|max:50|unique:professional_specialties,name,' . $this->id,
            'description' => 'max:200',
            'professional_type_id' => 'required|exists:professional_types,id',
        ];
    }
}
