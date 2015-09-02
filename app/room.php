<?php

namespace avaluestay;

use avaluestay\Contracts\RoomInterface;
use Illuminate\Database\Eloquent\Model;

class room extends Model implements RoomInterface
{
    protected $table="roomTypes";

    public function properties()
    {
        return $this->hasMany(property::class);
    }
}
