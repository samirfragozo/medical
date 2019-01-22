<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    use SoftDeletes;

    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'full_name'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    // Methods

    /**
     * Get the data to build the layout.
     *
     * @return array
     */
    public function getLayout(): array
    {
        return $this->layout;
    }

    // Mutator

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name;
    }
}
