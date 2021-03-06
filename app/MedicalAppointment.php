<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property string date
 * @property string date_table
 * @property string state
 * @property mixed patient
 * @property mixed professional
 */
class MedicalAppointment extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'actions', 'date_table', 'full_name', 'professional_specialty', 'select_value', 'translated_state',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $exported = [
        'date_table', 'professional_specialty', 'professional_id', 'patient_id', 'state', 'observations', 'diagnosis',
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
            'fields' => ['date', 'professional_specialty', 'professional_id', 'state'],
            'active' => false,
            'actions' => true,
        ],
        'form' => [
            [
                'name' => 'date',
                'type' => 'datetime',
            ],
            [
                'name' => 'observations',
                'type' => 'textarea',
            ],
            [
                'name' => 'professional_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'patient_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'diagnosis',
                'type' => 'textarea',
                'only-view' => true,
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
            'cancel' => $this->state == 'PENDIENTE',
            'next' => __('app.selects.medical_appointment.state_next.' . $this->state),
        ];
    }

    /**
     * Mutator for the date
     *
     * @param $value
     * @return string
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    /**
     * Mutator for the date of the table
     *
     * @return string
     */
    public function getDateTableAttribute()
    {
        return Carbon::parse($this->date)->format('Y-m-d H:i');
    }

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->date_table;
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

    /**
     * Mutator for the actions
     *
     * @return array
     */
    public function getProfessionalSpecialtyAttribute()
    {
        return $this->professional->professional_specialty->full_name;
    }

    // Relationships

    /**
     * Patient relationship
     *
     * @return BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Professional relationship
     *
     * @return BelongsTo
     */
    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
}
