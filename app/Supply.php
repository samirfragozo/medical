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
        'actions', 'translated_unit'
    ];

    /**
     * The data to build the layout.
     *
     * @var array
     */
    protected $layout = [
        'tools' => [
            'create' => true,
            'reload' => false,
        ],
        'table' => [
            'check' => false,
            'fields' => ['code', 'name', 'content', 'unit'],
            'active' => true,
            'actions' => true,
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
                'value' => 'app.selects.supply.unit',
            ],
        ],
    ];

    // Mutator

    /**
     * Mutator for the actions
     *
     * @return array
     */
    public function getActionsAttribute()
    {
        return [
            'id' => $this->id,
            'active' => $this->active,
        ];
    }

    /**
     * Mutator for the actions
     *
     * @return array
     */
    public function getTranslatedUnitAttribute()
    {
        return __('app.selects.supply.unit.' . $this->unit);
    }
}