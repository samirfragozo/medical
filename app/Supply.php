<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Supply extends Base
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'code', 'name', 'content', 'unit',
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
            'fields' => ['code', 'name', 'content', 'unit'],
            'active' => false,
            'actions' => false,
        ],
        'form' => [
            [
                'name' => 'code',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'type' => 'text',
            ],
            [
                'name' => 'content',
                'type' => 'text',
            ],
            [
                'name' => 'unit',
                'type' => 'text',
            ],
        ],
    ];

    // Relationships

    /**
     * Turn Supplies relationship
     *
     * @return HasMany
     */
    public function turn_supplies()
    {
        return $this->hasMany(TurnSupply::class);
    }
}
