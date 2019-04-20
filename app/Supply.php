<?php

namespace App;

class Supply extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'full_name', 'translated_unit'
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
                'type' => 'select',
                'value' => 'app.selects.supplies.unit',
            ],
        ],
    ];

    // Mutator

    /**
     * Mutator for the actions
     *
     * @return array
     */
    public function getTranslatedUnitAttribute()
    {
        return __('app.selects.supplies.unit.' . $this->unit);
    }
}
