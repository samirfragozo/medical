<?php

namespace App\Http\Requests;

/**
 * @property mixed id
 */
class SupplyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:12|unique:positions,code,' . $this->id,
            'description' => 'max:200',
            'name' => 'required|max:50|unique:positions,name,' . $this->id
        ];
    }
}
