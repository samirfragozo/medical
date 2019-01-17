<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The mutated attributes that should be added for arrays.
     *
     * @var array
     */
    protected $appends = [
        'full_name', 'picture'
    ];

    /**
     * The data to build the layout.
     *
     * @var array
     */
    protected $layout = [
        'form' => [
            [
                'type' => 'section',
                'value' => 'app.sections.personal_information',
            ],
            [
                'default' => '/img/people/default.jpg',
                'name' => 'picture',
                'type' => 'picture',
            ],
            [
                'name' => 'document_type',
                'only-view' => true,
                'type' => 'select',
                'value' => 'app.selects.person.document_type',
            ],
            [
                'name' => 'document',
                'only-view' => true,
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
                'name' => 'birth_date',
                'type' => 'date',
            ],
            [
                'name' => 'country_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'state_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'city_id',
                'type' => 'select_reload',
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
                'name' => 'state_id',
                'type' => 'select_reload',
            ],
            [
                'name' => 'city_id',
                'type' => 'select_reload',
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

    // Methods

    /**
     * Get the data to build the layout.
     *
     * @return array
     */
    public function getLayout(): array
    {
        return $this->layout;
    }

    // Mutator

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
        if(file_exists(storage_path('app/public/people/' . $this->id . '.jpg'))){
            return asset('storage/people/' . $this->id . '.jpg');
        }
        return asset('/img/people/default.jpg');
    }

    // Relationships

    /**
     * Patient relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    /**
     * Professional relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function professional()
    {
        return $this->hasOne(Professional::class);
    }

    /**
     * Relative relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function relative()
    {
        return $this->hasOne(Relative::class);
    }
}
