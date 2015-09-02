<?php
/**
 * Author: Xavier Au
 * Date: 31/8/15
 * Time: 6:09 PM
 */

namespace avaluestay\Services;

use avaluestay\BankAccount;
use avaluestay\Contracts\PropertyInterface;
use Illuminate\Support\Facades\Auth;

class PropertyManager
{
    private $property;

    /**
     * PropertyManager constructor.
     * @param $property
     */
    public function __construct(PropertyInterface $property)
    {
        $this->property = $property;
    }

    public function createANewProperty(array $data)
    {
        $data["bedType_Id"] = 1;
        $data["commission_id"] = 1;
        $data["currency_id"] = env("BASE_CURRENCY_CODE");
        $data["user_id"] = Auth::user()->id;

        $property = $this->property->create($data);
        $this->createBankInfoForTheProperty($property);

        return $property;
    }

    private function createBankInfoForTheProperty($property)
    {
        $bankAccount = new BankAccount();
        $bankAccount->property_id = $property->id;
        $bankAccount->save();
    }
}