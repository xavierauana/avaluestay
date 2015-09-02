<?php

namespace avaluestay;

use avaluestay\Contracts\WishListInterface;
use Illuminate\Database\Eloquent\Model;

class wishList extends Model implements WishListInterface
{
    protected $table = "wish_lists";

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function properties()
    {
        return $this->belongsTo(property::class);
    }
}
