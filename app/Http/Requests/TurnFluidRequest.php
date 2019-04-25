<?php

namespace App\Http\Requests;

use App\Turn;

/**
 * @property mixed turn_id
 */
class TurnFluidRequest extends BaseRequest
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
            'type' => 'required|in:' . implode(',', array_keys(__('app.selects.turn_fluids.types'))),
            'total' => 'required|numeric|between:0.01,10000',
            'observations' => 'nullable|max:200',
            'turn_id' => 'required|exists:turns,id',
        ];
    }
}
