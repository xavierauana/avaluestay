<?php

namespace avaluestay;

use avaluestay\Contracts\BankInfoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class bankinfo extends Model implements BankInfoInterface
{
    protected $table="bankinfo";

    protected $fillable = [
        "bank_name","bank_address","acct_name","acct_number","iban","swift_code"
    ];
    public function property()
    {
        return $this->belongsTo(property::class);
    }

    public function getBankNameAttribute($value)
    {
        return $value? Crypt::decrypt($value) : "";
    }
    public function getBankAddressAttribute($value)
    {
        return $value? Crypt::decrypt($value) : "";
    }
    public function getAcctNameAttribute($value)
    {
        return $value? Crypt::decrypt($value) : "";
    }
    public function getAcctNumberAttribute($value)
    {
        return $value? Crypt::decrypt($value) : "";
    }
    public function getIbanAttribute($value)
    {
        return $value? Crypt::decrypt($value) : "";
    }
    public function getSwiftCodeAttribute($value)
    {
        return $value? Crypt::decrypt($value) : "";
    }
}
