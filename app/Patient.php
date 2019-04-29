<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'document_type', 'document', 'name', 'last_name', 'sex', 'civil_status', 'birth_date', 'address', 'neighborhood', 'phone',
        'cellphone', 'social_security_entity_id', 'medicines', 'medicines_description', 'allergies', 'allergies_description',
        'medication_allergies', 'medication_allergies_description',
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
            'fields' => ['document', 'name', 'last_name',  'sex', 'social_security_entity_id'],
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
        return "{$this->name} {$this->last_name}";
    }

    // Relationships

    /**
     * Medical Appointment relationship
     *
     * @return HasMany
     */
    public function medical_appointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    /**
     * Relatives relationship
     *
     * @return HasMany
     */
    public function relatives()
    {
        return $this->hasMany(Relative::class);
    }

    /**
     * Social Security relationship
     *
     * @return BelongsTo
     */
    public function social_security_entity()
    {
        return $this->belongsTo(SocialSecurityEntity::class);
    }

    /**
     * Turns relationship
     *
     * @return HasMany
     */
    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
