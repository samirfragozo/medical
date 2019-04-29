<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfessionalType extends Base
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'code', 'name', 'description',
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
            'fields' => ['code', 'name'],
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
                'name' => 'description',
                'type' => 'textarea',
            ],
        ],
    ];

    // Relationships

    /**
     * Professional Specialty relationship
     *
     * @return HasMany
     */
    public function professional_specialty()
    {
        return $this->hasMany(ProfessionalSpecialty::class);
    }
}
