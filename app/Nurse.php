<?php

namespace App;

/**
 * @property integer id
 * @property string document
 * @property string name
 * @property string last_name
 * @property boolean active
 */
class Nurse extends Base
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'actions', 'full_name', 'picture',
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
            'fields' => ['picture', 'document', 'name'],
            'active' => true,
            'actions' => true,
        ],
        'form' => [
            [
                'type' => 'section',
                'value' => 'app.sections.personal_information',
            ],
            [
                'default' => '/img/professionals/default.jpg',
                'name' => 'picture',
                'type' => 'picture',
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
        return $this->name . ' ' . $this->last_name;
    }

    /**
     * Mutator for the picture route
     *
     * @return string
     */
    public function getPictureAttribute()
    {
        if(file_exists(storage_path('app/public/nurses/' . $this->id . '.jpg'))){
            return asset('storage/nurses/' . $this->id . '.jpg');
        }
        return asset('/img/nurses/default.jpg');
    }
    /**
     * Mutator for the value to show in the select
     *
     * @return string
     */
    public function getSelectValueAttribute()
    {
        return 'Enfermera - ' . $this->name . ' ' . $this->last_name;
    }

    // Relationships

    /**
     * Turn relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
