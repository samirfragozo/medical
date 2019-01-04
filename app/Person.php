<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
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
}
