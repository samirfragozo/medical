<?php

namespace App\Http\Requests;

class MedicalAppointmentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|after_or_equal:today',
            'observations' => 'max:200',
            'patient_id' => 'required|exists:patients,id',
            'professional_id' => 'required|exists:professionals,id',
        ];
    }
}
