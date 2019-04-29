<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed professional_type
 */
class ProfessionalSpecialty extends Base
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'code', 'name', 'professional_type_id', 'description',
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
            'fields' => ['code', 'name', 'professional_type_id'],
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
                'name' => 'professional_type_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
            ],
        ],
    ];

    // Mutator

    /**
     * Mutator for the value to show in the select
     *
     * @return string
     */
    public function getSelectValueAttribute()
    {
        return "{$this->professional_type->name} - {$this->name}";
    }

    // Relationships

    /**
     * Medical Appointment relationship
     *
     * @return HasMany
     */
    public function professional()
    {
        return $this->hasMany(Professional::class);
    }

    /**
     * Professional Specialty relationship
     *
     * @return BelongsTo
     */
    public function professional_type()
    {
        return $this->belongsTo(ProfessionalType::class);
    }

}
