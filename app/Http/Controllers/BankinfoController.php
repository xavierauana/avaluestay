<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Contracts\BankInfoInterface;
use avaluestay\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BankinfoController extends Controller
{
    private $info;

    /**
     * BankinfoController constructor.
     *
     * @param $info
     */
    public function __construct(BankInfoInterface $info)
    {
        $this->info = $info;
    }

    public function updateBankInfo(Request $request, $propertyId)
    {
        if ($request->ajax()) {
            $info = $this->info->wherePropertyId($propertyId)->first();
            if (!$info) {
                $this->info->property_id = $propertyId;
                $this->info->save();
                $info = $this->info;
            }

            $data = $request->all();
            foreach ($data as $key => $val) {
                $data[$key] = Crypt::encrypt($val);
            }
            $info->update($data);
        }
    }

}
