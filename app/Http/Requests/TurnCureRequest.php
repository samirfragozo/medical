<?php

namespace App\Http\Requests;

use App\Turn;

/**
 * @property mixed turn_id
 */
class TurnCureRequest extends BaseRequest
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
            'observations' => 'required|max:200',
            'turn_id' => 'required|exists:turns,id',
        ];
    }
}
