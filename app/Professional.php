<?php

namespace App;

class Professional extends Base
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
                'type' => 'section',
                'value' => 'app.sections.academic_information',
            ],
            [
                'name' => 'type',
                'type' => 'select',
                'value' => 'app.selects.professional.type',
            ],
            [
                'name' => 'doctor_type',
                'type' => 'select',
                'value' => 'app.selects.professional.doctor_type',
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
}
