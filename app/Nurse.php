<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property string document
 * @property string name
 * @property string last_name
 */
class Nurse extends Base
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'document_type', 'document', 'name', 'last_name', 'sex', 'civil_status', 'birth_date', 'address', 'neighborhood', 'phone', 'cellphone', 'email',
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
            'fields' => ['document', 'name'],
            'active' => false,
            'actions' => true,
        ],
        'form' => [
            [
                'name' => 'document_type',
                'type' => 'select',
                'value' => 'app.selects.person.document_type',
            ],
            [
                'name' => 'document',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'type' => 'text',
            ],
            [
                'name' => 'last_name',
                'type' => 'text',
            ],
            [
                'name' => 'sex',
                'type' => 'select',
                'value' => 'app.selects.person.sex',
            ],
            [
                'name' => 'civil_status',
                'type' => 'select',
                'value' => 'app.selects.person.civil_status',
            ],
            [
                'name' => 'birth_date',
                'type' => 'date',
            ],
            [
                'type' => 'section',
                'value' => 'app.sections.contact_information',
            ],
            [
                'name' => 'address',
                'type' => 'text'
            ],
            [
                'name' => 'neighborhood',
                'type' => 'text'
            ],
            [
                'name' => 'phone',
                'type' => 'text'
            ],
            [
                'name' => 'cellphone',
                'type' => 'text'
            ],
            [
                'name' => 'email',
                'type' => 'text'
            ],
        ],
    ];

    // Mutator

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }

    /**
     * Mutator for the value to show in the select
     *
     * @return string
     */
    public function getSelectValueAttribute()
    {
        return "Enfermera - {$this->name} {$this->last_name}";
    }

    // Relationships

    /**
     * Turn relationship
     *
     * @return HasMany
     */
    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
