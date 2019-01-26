<?php

namespace App;

class Patient extends Base
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
            'fields' => ['picture', 'document', 'name', 'social_security_entity_id'],
            'active' => true,
            'actions' => true,
        ],
        'form' => [
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

    // Methods

    /**
     * Get the data to build the layout.
     *
     * @return array
     */
    public function getLayout(): array
    {
        $layout = $this->layout;
        $personLayout = (new Person)->getLayout();

        foreach ($personLayout as $key =>$value) $layout[$key] = array_merge($personLayout[$key], $this->layout[$key]);

        return array_merge($layout);
    }

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
            'active' => $this->active ? 0 : 1,
        ];
    }

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->person->full_name;
    }

    // Relationships

    /**
     * Medical Appointment relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medical_appointment()
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    /**
     * Person relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * Relative relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relative()
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
}
