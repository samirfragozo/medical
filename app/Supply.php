<?php

namespace App;

class Supply extends Base
{
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
            'fields' => ['name'],
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
                'value' => 'app.selects.supply.unit',
            ],
        ],
    ];
}
