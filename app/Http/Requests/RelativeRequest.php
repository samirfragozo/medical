<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'document_type' => 'required|in:' . implode(',', array_keys(__('app.selects.person.document_type'))),
            'document' => 'required|numeric|digits_between:6,12|unique:patients,document,' . $this->id,
            'name' => 'required|min:3|max:50|alpha_space',
            'last_name' => 'required|min:3|max:50|alpha_space',
            'sex' => 'required|in:' . implode(',', array_keys(__('app.selects.person.sex'))),
            'address' => 'required|min:3|max:50',
            'neighborhood' => 'required|min:3|max:50',
            'phone' => 'required_without:cellphone|numeric|digits_between:6,12|bail',
            'cellphone' => 'nullable|numeric|digits_between:6,12|bail',
            'relationship' => 'required|in:' . implode(',', array_keys(__('app.selects.relative.relationship'))),
        ];
    }
}
