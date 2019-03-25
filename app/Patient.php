<?php

namespace App;

/**
 * @property integer id
 * @property string name
 * @property string last_name
 * @property string full_name
 * @property mixed social_security_entity
 */
class Patient extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'full_name', 'social_security_entity_name'
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
            'fields' => ['document', 'name', 'social_security_entity_id'],
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
                'type' => 'section',
                'value' => 'app.sections.medical_information',
            ],
            [
                'name' => 'social_security_entity_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'medicines',
                'type' => 'switch',
            ],
            [
                'name' => 'medicines_description',
                'type' => 'textarea',
            ],
            [
                'name' => 'allergies',
                'type' => 'switch',
            ],
            [
                'name' => 'allergies_description',
                'type' => 'textarea',
            ],
            [
                'name' => 'medication_allergies',
                'type' => 'switch',
            ],
            [
                'name' => 'medication_allergies_description',
                'type' => 'textarea',
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

    /**
     * Mutator for the value to show in the select
     *
     * @return string
     */
    public function getSelectValueAttribute()
    {
        return $this->full_name;
    }

    /**
     * Mutator for the value to show in the select
     *
     * @return string
     */
    public function getSocialSecurityEntityNameAttribute()
    {
        return $this->social_security_entity->name;
    }

    // Relationships

    /**
     * Medical Appointment relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medical_appointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    /**
     * Relatives relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relatives()
    {
        return $this->hasMany(Relative::class);
    }

    /**
     * Social Security relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function social_security_entity()
    {
        return $this->belongsTo(SocialSecurityEntity::class);
    }

    /**
     * Turns relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
