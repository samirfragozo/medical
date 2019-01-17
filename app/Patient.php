<?php

namespace App;

class Patient extends Base
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
                'value' => 'app.sections.medical_information',
            ],
            [
                'name' => 'allergies',
                'type' => 'radio',
                'value' => [
                    'yes',
                    'no',
                ],
            ],
            [
                'name' => 'allergies_description',
                'type' => 'textarea',
            ],
            [
                'name' => 'medication_allergies',
                'type' => 'radio',
                'value' => [
                    'yes',
                    'no',
                ],
            ],
            [
                'name' => 'medication_allergies_description',
                'type' => 'textarea',
            ],
            [
                'name' => 'medicines',
                'type' => 'radio',
                'value' => [
                    'yes',
                    'no',
                ],
            ],
            [
                'name' => 'medicines_description',
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
     * Person relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relative()
    {
        return $this->hasMany(Relative::class);
    }
}
