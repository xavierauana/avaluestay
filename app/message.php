<?php

namespace avaluestay;

use avaluestay\Contracts\MessageInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class message extends Model implements MessageInterface
{
    public function sender()
    {
        return $this->belongsTo(user::class);
    }

    public function receiver()
    {
        return $this->belongsTo(user::class);
    }

    /**
     * @return Collection
     */
    public function getTotalUnreadMessagesAttribute()
    {
        return $this->where("receiver_id", Auth::user()->id)
            ->where('read', 0)
            ->get();
    }

    /**
     * @return Collection
     */
    public function getUnreadMessagesFromTheSenderAttribute()
    {
        return $this->where("receiver_id", Auth::user()->id)
            ->where('sender_id', $this->sender_id)
            ->where('read', 0)
            ->get();
    }
}
