<?php

namespace avaluestay;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $dates=[
        'checkInDate', 'checkOutDate'
    ];

    protected $fillable = [
        'user_id', 'property_id', 'invoice_id', 'price', 'checkInDate', 'checkOutDate'
    ];

    public function invoice()
    {
        $this->belongsTo(invoice::class);
    }

    public function property()
    {
        return $this->belongsTo(property::class);
    }
}

