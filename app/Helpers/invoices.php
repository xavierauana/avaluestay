<?php
use avaluestay\Contracts\InvoiceInterface;
use Illuminate\Support\Facades\App;

/**
 * Author: Xavier Au
 * Date: 25/8/15
 * Time: 11:09 PM
 */

function generateRandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $length = 31;
    do {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    } while (App::make(InvoiceInterface::class)->where("orderRef", "=", $randomString)->first());

    return $randomString;
}