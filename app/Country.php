<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Set baseQuery variable
     *
     * @return array
     */
    public function select()
    {
        return $this->get()->sortBy('name')->pluck('name', 'id');
    }
}
