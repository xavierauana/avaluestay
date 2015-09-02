<?php

namespace avaluestay;

use avaluestay\Contracts\NoticeInterface;
use Illuminate\Database\Eloquent\Model;

class notice extends Model implements NoticeInterface
{
    public function user()
    {
        return $this->belongsTo(user::class, 'notify_user_id');
    }
}
