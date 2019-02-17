<?php

namespace App;

use Carbon\Carbon;

/**
 * @property integer id
 * @property string date
 * @property string start
 * @property string end
 * @property string state
 * @property mixed nurse
 */
class Turn extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'actions', 'end_table', 'full_name', 'nurse_name',  'patient_name', 'start_table', 'translated_state',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'data',
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
            'fields' => ['start', 'end', 'nurse_id', 'state'],
            'active' => false,
            'actions' => true,
        ],
        'form' => [
            [
                'name' => 'start',
                'type' => 'datetime',
            ],
            [
                'name' => 'end',
                'type' => 'datetime',
            ],
            [
                'name' => 'observations',
                'type' => 'textarea',
            ],
            [
                'name' => 'nurse_id',
                'type' => 'select_reload',
            ],
        ],
    ];

    // Mutator

    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getStartTableAttribute()
    {
        return Carbon::parse($this->start)->format('Y-m-d H:i');
    }

    public function getEndTableAttribute()
    {
        return Carbon::parse($this->end)->format('Y-m-d H:i');
    }

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
            'next' => __('app.selects.turns.state_next.' . $this->state),
        ];
    }

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->start_table . ' a ' . $this->end_table;
    }

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getNurseNameAttribute()
    {
        return $this->nurse->full_name;
    }

    /**
     * Mutator for the full name
     *
     * @return string
     */
    public function getPatientNameAttribute()
    {
        return $this->patient->full_name;
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
     * Patient relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Nurse relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nurse()
    {
        return $this->belongsTo(Nurse::class);
    }
}
