<?php

namespace App\Http\Requests;

use App\Turn;

/**
 * @property mixed turn_id
 */
class TurnMedicineRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $turn = Turn::find($this->turn_id);

        return [
            'date' => 'required|date|after_or_equal:' . $turn->start_table . '|before_or_equal:' . $turn->end_table,
            'medicine_name' => 'required|min:3|max:50',
            'dose' => 'required|numeric|between:0.01,10000',
            'unit' => 'required|min:3|max:25|alpha_space',
            'route' => 'required|in:' . implode(',', array_keys(__('app.selects.turn_medicines.routes'))),
            'observations' => 'nullable|max:200',
            'turn_id' => 'required|exists:turns,id',
        ];
    }
}
