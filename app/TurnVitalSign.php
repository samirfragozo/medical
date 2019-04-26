<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed date
 * @property mixed date_table
 * @property mixed TA_D
 * @property mixed TA_S
 */
class TurnVitalSign extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'date_table', 'full_name', 'TA',
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
        ],
        'table' => [
            'check' => false,
            'fields' => ['date', '_TA', '_FR', '_FC', '_SPO2', '_T'],
            'active' => false,
            'actions' => false,
        ],
        'form' => [
            [
                'name' => 'date',
                'type' => 'datetime',
            ],
            [
                'name' => 'TA_S',
                'type' => 'text',
            ],
            [
                'name' => 'TA_D',
                'type' => 'text',
            ],
            [
                'name' => 'FR',
                'type' => 'text',
            ],
            [
                'name' => 'FC',
                'type' => 'text',
            ],
            [
                'name' => 'SPO2',
                'type' => 'text',
            ],
            [
                'name' => 'T',
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

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getTAAttribute()
    {
        return "{$this->TA_S}/{$this->TA_D}";
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
