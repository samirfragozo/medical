<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnRequest extends FormRequest
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
            'start' => 'required|date|after_or_equal:today',
            'end' => 'required|date|after:start',
            'observations' => 'max:200',
            'nurse_id' => 'required|exists:nurses,id',
            'patient_id' => 'required|exists:patients,id',
        ];
    }
}
