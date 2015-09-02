<?php

namespace avaluestay;

use avaluestay\Contracts\MediaInterface;
use Illuminate\Database\Eloquent\Model;

class media extends Model implements MediaInterface
{
    protected $guarded = [
      'created_at', 'updated_at'
    ];

    public function property()
    {
        return $this->belongsTo(property::class);
    }

    public function firstImage()
    {
        return $this->orderBy('created_at')->where("type", "like", "image%")->first();
    }
}
