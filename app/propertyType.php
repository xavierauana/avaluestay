<?php

namespace avaluestay;

use avaluestay\Contracts\PropertyTypeInterface;
use Illuminate\Database\Eloquent\Model;

class propertyType extends Model implements PropertyTypeInterface
{
    protected $table="propertyTypes";

    public function properties()
    {
        return $this->hasMany(property::class);
    }
}
