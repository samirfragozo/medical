<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed date
 * @property mixed date_table
 */
class TurnFluid extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'date_table', 'full_name',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'data',
    ];

    /**
     * The data to build the layout.
     *
     * @var array
     */
    protected $layout = [
        'tools' => [
            'create' => true,
            'reload' => true,
                        'export' => true,
        ],
        'table' => [
            'check' => false,
            'fields' => ['date', 'type', 'total'],
            'active' => false,
            'actions' => false,
        ],
        'form' => [
            [
                'name' => 'date',
                'type' => 'datetime',
            ],
            [
                'name' => 'type',
                'type' => 'select',
                'value' => 'app.selects.turn_fluids.types',
            ],
            [
                'name' => 'total',
                'type' => 'text',
            ],
            [
                'name' => 'observations',
                'type' => 'textarea',
            ],
        ],
    ];

    // Mutator

    /**
     * Mutator for the date
     *
     * @param $value
     * @return string
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    /**
     * Mutator for the date of the table
     *
     * @return string
     */
    public function getDateTableAttribute()
    {
        return Carbon::parse($this->date)->format('Y-m-d H:i');
    }

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->date_table;
    }

    // Relationships

    /**
     * Turn relationship
     *
     * @return BelongsTo
     */
    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }
}
