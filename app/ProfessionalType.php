<?php

namespace App;

class ProfessionalType extends Base
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
                'name' => 'description',
                'type' => 'textarea',
            ],
        ],
    ];

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
