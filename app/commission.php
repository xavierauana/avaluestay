<?php

namespace avaluestay;

use Illuminate\Database\Eloquent\Model;

class commission extends Model
{
    protected $table = "commission_tiers";

    public function properties()
    {
        return $this->hasMany(property::class);
    }
}
