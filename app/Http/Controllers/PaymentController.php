<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Events\UserSubscription;
use avaluestay\Http\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pSuccess(Request $request)
    {
        switch ($request->get("type")) {
            case "subscription":
                event(new UserSubscription($request->all()));
        }

        return redirect("/" . $request->get('redirect'))->withMessage("You have upgrade your account to subscritpion user");
    }

    public function pFail(Request $request)
    {
        dd($request->all());
    }

    public function pError(Request $request)
    {
        dd($request->all());
    }
}
