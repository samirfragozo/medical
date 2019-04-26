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
            'code' => 'required|max:12|unique:supplies,code,' . $this->id,
            'name' => 'required|max:50|unique:supplies,name,' . $this->id,
            'content' => 'required|numeric|between:0.01,1000000',
            'unit' => 'required|min:3|max:25|alpha_space',
        ];
    }
}
