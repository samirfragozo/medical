<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialSecurityEntity extends Base
{
    // Relationships

    /**
     * Patient relationship
     *
     * @return HasMany
     */
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}
