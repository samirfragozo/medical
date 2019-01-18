<?php

namespace App;

class Relative extends Base
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
            'fields' => ['picture', 'document', 'name', 'cellphone'],
            'active' => false,
            'actions' => true,
        ],
        'form' => [
            [
                'name' => 'relationship',
                'type' => 'select',
                'value' => 'app.selects.relative.relationship',
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

        foreach ($personLayout as $key => $value) $layout[$key] = array_merge($personLayout[$key], $this->layout[$key]);

        return array_merge($layout);
    }

    // Relationships

    /**
     * Person relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
