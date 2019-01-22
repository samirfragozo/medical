<?php

namespace App;

class ProfessionalSpecialty extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'actions', 'full_name',
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
            'fields' => ['code', 'name', 'professional_type_id'],
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
            [
                'name' => 'professional_type_id',
                'type' => 'select_reload',
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
     * Medical Appointment relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professional()
    {
        return $this->hasMany(Professional::class);
    }

    /**
     * Professional Specialty relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professional_type()
    {
        return $this->belongsTo(ProfessionalType::class);
    }

}
