<?php

namespace App\Http\Requests;

/**
 * @property mixed id
 */
class ProfessionalTypeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:12|unique:professional_types,code,' . $this->id,
            'name' => 'required|max:50|unique:professional_types,name,' . $this->id,
            'description' => 'max:200',
        ];
    }
}
