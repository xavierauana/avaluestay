<?php

namespace avaluestay;

use avaluestay\Contracts\PropertyInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class property extends Model implements PropertyInterface
{
    protected $fillable = [
        'address1',
        'address2',
        'address3',
        'city',
        'country',
        'user_id',
        "propertyType_id",
        "roomType_id",
        "bedType_id",
        "commission_id",
        "accommodates",
        "currency_id",
    ];

    protected $dates = [
        'checkIn', 'checkOut'
    ];

    public function facilities()
    {
        return $this->belongsToMany(facility::class);
    }

    public function owner()
    {
        return $this->belongsTo(user::class, "user_id");
    }

    public function propertyType()
    {
        return $this->belongsTo(propertyType::class, "propertyType_id");
    }

    public function roomType()
    {
        return $this->belongsTo(room::class);
    }

    public function media()
    {
        return $this->hasMany(media::class);
    }

    public function services()
    {
        return $this->hasMany(service::class);
    }

    public function currency()
    {
        return $this->belongsTo(currency::class);
    }

    public function address()
    {
        $address = [];
        if ($this->address1) {
            $address[] = $this->address1;
        }
        if ($this->address2) {
            $address[] = $this->address2;
        }
        if ($this->address3) {
            $address[] = $this->address3;
        }
        if ($this->city) {
            $address[] = $this->city;
        }
        if ($this->country) {
            $address[] = $this->country;
        }

        return implode(",", $address);
    }

    public function bank()
    {
        return $this->hasOne(bankinfo::class);
    }

    public function commission()
    {
        return $this->belongsTo(commission::class);
    }

    public function getShowPriceAttribute()
    {
        $price = (1 + $this->commission->rate) * $this->price;

        return $price;
    }

    public function wishList()
    {
        return $this->hasMany(wishList::class);
    }

    public function isFavorite($userId)
    {
        return in_array($userId, $this->wishList()->lists('user_id')->toArray());
    }


    public function updatePropertyLocation(Request $request)
    {
        $this->update($request->all());

        return $this;
    }

    public function reviews()
    {
        return $this->hasMany(review::class);
    }

    public function bookings()
    {
        return $this->hasMany(booking::class);
    }

    public function unavailableDatesForBooking()
    {
        $dates = [];
        $bookings = $this->bookings()->where('checkOutDate', ">", Carbon::now())->get();
        foreach ($bookings as $booking) {
            $duration = $booking->checkOutDate->diffInDays($booking->checkInDate);
            $temp = $booking->checkInDate->format('d F Y');
            if (!in_array($temp, $dates)) {
                $dates[] = $temp;
            }

            for ($i = 1; $i < $duration; $i++) {
                $temp = $booking->checkInDate->addDays($i)->format('d F Y');
                if (!in_array($temp, $dates)) {
                    $dates[] = $temp;
                }
            }
        }
        return $dates;
    }

    public function rating()
    {
        $reviews = $this->reviews()->get();
        if (count($reviews) < 3) {
            return 0;
        } else {
            $average = $reviews->sum(function ($review) {
                    return $review->rating;
                }) / $reviews->count();
            $partial = $average - floor($average);
            if ($partial >= 0.75) {
                return floor($average) + 1;
            }
            if ($partial < 0.25) {
                return floor($average);
            };
            if ($partial >= 0.25 && $partial < 0.75) {
                return floor($average) + 0.5;
            };
        }
    }
}
