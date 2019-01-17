<?php

namespace App;

class MedicalAppointment extends Base
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
                'name' => 'date',
                'type' => 'date',
            ],
            [
                'name' => 'start',
                'type' => 'text',
            ],
            [
                'name' => 'end',
                'type' => 'text',
            ],
            [
                'name' => 'observations',
                'type' => 'textarea',
            ],
            [
                'name' => 'professional_speciality_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'professional_id',
                'type' => 'select_reload',
            ],
        ],
    ];

    // Relationships

    /**
     * Professional relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    /**
     * Patient relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
