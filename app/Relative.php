<?php

namespace App;

/**
 * @property string name
 * @property string last_name
 */
class Relative extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'document_type', 'document', 'name', 'last_name', 'sex', 'address', 'neighborhood', 'phone', 'cellphone', 'relationship',
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
            'fields' => ['document', 'name', 'relationship', 'cellphone'],
            'active' => false,
            'actions' => true,
        ],
        'form' => [
            [
                'type' => 'section',
                'value' => 'app.sections.personal_information',
            ],
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
                'name' => 'relationship',
                'type' => 'select',
                'value' => 'app.selects.relative.relationship',
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
        return $this->name . ' ' . $this->last_name;
    }

    // Relationships

    /**
     * Person relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
