<?php

namespace avaluestay;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = [
        "created_at", "updated_at", "expiry_date"
    ];


    public function properties()
    {
        return $this->hasMany(property::class);
    }

    public function hasRole($role)
    {
        return $this->type == $role;
    }
    public function sentMessages()
    {
        return $this->hasMany(message::class, "sender_id");
    }
    public function receivedMessages()
    {
        return $this->hasMany(message::class, "receiver_id");
    }

    public function canReadMessage()
    {
        if($this->type == "manager"){
            return true;
        }elseif($this->type == "cuser"){
            if($this->credit > 0){
                $this->credit = $this->credit-1;
                $this->save();
                return true;
            }
            return false;
        }elseif($this->type == "suser"){
            if($this->expierydate > Carbon::now()){
                return true;
            }
            return false;
        }
        return false;
    }

    public function notices()
    {
        return $this->hasMany(notice::class,'notify_user_id');
    }

    public function hasNotice()
    {
        return $this->notices()->whereStatus(0)->count() > 0 ? true : false;
    }

    public function fetchNotices()
    {
        $allNotices = $this->notices()->whereStatus(0)->get();
        $groupedNotice = $allNotices->groupBy("object");
        return $groupedNotice;
    }

    public function sentInvoices()
    {
        return $this->hasMany(invoice::class, "sender_id");
    }

    public function receivedInvoices()
    {
        return $this->hasMany(invoice::class, "payee_id");
    }

    public function favorites()
    {
        return $this->hasMany(wishList::class);
    }
}
