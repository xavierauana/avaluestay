<?php

use Carbon\Carbon;

function convertToCarbonDate($DDMMYYYY){
    $format = "d F Y";
    return Carbon::createFromFormat($format, $DDMMYYYY);
}