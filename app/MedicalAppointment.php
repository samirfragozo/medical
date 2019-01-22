<?php

namespace App;

class MedicalAppointment extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'actions', 'translated_state'
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
            'fields' => ['date', 'hour', 'professional_specialty_id', 'professional_id', 'state'],
            'active' => false,
            'actions' => true,
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
                'name' => 'professional_specialty_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'professional_id',
                'type' => 'select_reload',
            ],
        ],
    ];

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
            'cancel' => $this->state == 'ATENDIDA' or $this->state == 'PENDIENTE',
        ];
    }


    /**
     * Mutator for the actions
     *
     * @return array
     */
    public function getTranslatedStateAttribute()
    {
        return [
            'state' => $this->state,
            'class' => __('app.selects.medical_appointment.state_class.' . $this->state),
        ];
    }

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
