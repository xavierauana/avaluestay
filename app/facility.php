<?php

namespace avaluestay;

use avaluestay\Contracts\FacilityInterface;
use Illuminate\Database\Eloquent\Model;

class facility extends Model implements FacilityInterface
{
    public function properties()
    {
        return $this->belongsToMany(property::class);
    }
}
