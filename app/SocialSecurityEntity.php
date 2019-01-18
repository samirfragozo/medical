<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialSecurityEntity extends Model
{

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
