<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialSecurityEntity extends Model
{
    // Methods
    /**
     * Set baseQuery variable
     *
     * @return array
     */
    public function select()
    {
        return $this->get()->sortBy('name')->pluck('name', 'id');
    }

    // Relationships

    /**
     * Patient relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}
