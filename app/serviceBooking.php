<?php

namespace avaluestay;

use Illuminate\Database\Eloquent\Model;

class serviceBooking extends Model
{
    protected $fillable=[
      'user_id', 'service_id', 'quantity', 'invoice_id'
    ];

    public function service()
    {
        return $this->belongsTo(service::class);
    }
}
