<?php

namespace avaluestay;

use avaluestay\Contracts\CurrencyInterface;
use Illuminate\Database\Eloquent\Model;

class currency extends Model implements CurrencyInterface
{
    public function property()
    {
        return $this->hasMany(property::class);
    }
}
