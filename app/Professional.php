<?php

namespace App;

class Professional extends Base
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
            'fields' => ['picture', 'document', 'name', 'professional_type_id'],
            'active' => true,
            'actions' => true,
        ],
        'form' => [
            [
                'type' => 'section',
                'value' => 'app.sections.academic_information',
            ],
            [
                'name' => 'professional_type_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'professional_specialty_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'name' => 'title_type',
                'type' => 'select',
                'value' => 'app.selects.professional.title_type',
            ],
            [
                'name' => 'collage',
                'type' => 'text',
            ],
            [
                'name' => 'year',
                'type' => 'text',
            ],
        ],
    ];

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
            'active' => $this->active,
        ];
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
     * Professional Speciality relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professional_specialty()
    {
        return $this->belongsTo(ProfessionalSpecialty::class);
    }
}
