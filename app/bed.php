<?php

namespace avaluestay;

use avaluestay\Contracts\BedInterface;
use Illuminate\Database\Eloquent\Model;

class bed extends Model implements BedInterface
{
    protected $table="bedTypes";
    //
}
