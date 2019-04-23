<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property string date
 * @property string start
 * @property string end
 * @property string state
 * @property mixed nurse
 * @property mixed patient
 * @property mixed start_table
 * @property mixed end_table
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
            'reload' => true,
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
            [
                'name' => 'patient_id',
                'type' => 'select_reload',
            ],
        ],
    ];

    // Mutator

    /**
     * Mutator for the start date
     *
     * @param $value
     * @return string
     */
    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    /**
     * Mutator for the end date
     *
     * @param $value
     * @return string
     */
    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    /**
     * Mutator for the start date of the table
     *
     * @return string
     */
    public function getStartTableAttribute()
    {
        return Carbon::parse($this->start)->format('Y-m-d H:i');
    }

    /**
     * Mutator for the end date of the table
     *
     * @return string
     */
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
            'state' => __('app.selects.turns.state.' . $this->state),
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
            'class' => __('app.selects.turns.state_class.' . $this->state),
        ];
    }

    // Relationships

    /**
     * Turn Cures relationship
     *
     * @return HasMany
     */
    public function cures()
    {
        return $this->hasMany(TurnCure::class);
    }

    /**
     * Turn Fluids relationship
     *
     * @return HasMany
     */
    public function fluids()
    {
        return $this->hasMany(TurnFluid::class);
    }

    /**
     * Turn Medicines relationship
     *
     * @return HasMany
     */
    public function medicines()
    {
        return $this->hasMany(TurnMedicine::class);
    }

    /**
     * Turn Notes relationship
     *
     * @return HasMany
     */
    public function notes()
    {
        return $this->hasMany(TurnNote::class);
    }

    /**
     * Nurse relationship
     *
     * @return BelongsTo
     */
    public function nurse()
    {
        return $this->belongsTo(Nurse::class);
    }

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
     * Turn Supplies relationship
     *
     * @return HasMany
     */
    public function supplies()
    {
        return $this->hasMany(TurnSupply::class);
    }

    /**
     * Turn Vital Signs relationship
     *
     * @return HasMany
     */
    public function vital_signs()
    {
        return $this->hasMany(TurnVitalSign::class);
    }
}
