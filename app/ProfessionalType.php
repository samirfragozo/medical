<?php

namespace App;

class ProfessionalType extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'actions'
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
            'fields' => ['code', 'name'],
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
                'name' => 'description',
                'type' => 'textarea',
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

    // Relationships

    /**
     * Professional Specialty relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professional_specialty()
    {
        return $this->hasMany(ProfessionalSpecialty::class);
    }
}
