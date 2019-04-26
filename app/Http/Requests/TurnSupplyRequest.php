<?php

namespace App\Http\Requests;

use App\Turn;

/**
 * @property mixed turn_id
 */
class TurnSupplyRequest extends BaseRequest
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
            'quantity' => 'required|numeric|between:0.01,1000',
            'unit' => 'required|min:3|max:25|alpha_space',
            'observations' => 'nullable|max:200',
            'supply_id' => 'required|exists:supplies,id',
            'turn_id' => 'required|exists:turns,id',
        ];
    }
}
