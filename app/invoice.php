<?php

namespace avaluestay;

use avaluestay\Contracts\InvoiceInterface;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model implements InvoiceInterface
{
    protected $fillable = [
        'duration','payee_id','seller_id','amount','orderRef','status'
    ];


    public function owner()
    {
        return $this->belongsTo(user::class, 'seller_id');
    }

    public function tenant()
    {
        return $this->belongsTo(user::class, 'payee_id');
    }

    public function booking()
    {
        return $this->hasOne(booking::class);
    }

    public function bookedServices()
    {
        return $this->hasMany(serviceBooking::class);
    }
}
