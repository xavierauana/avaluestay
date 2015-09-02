<?php

namespace avaluestay;

use avaluestay\Contracts\ServiceInterface;
use Illuminate\Database\Eloquent\Model;

class service extends Model implements ServiceInterface
{
    public function property()
    {
        return $this->belongsTo(property::class);
    }
}
