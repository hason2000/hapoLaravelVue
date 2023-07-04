<?php

use Illuminate\Support\Carbon;

function limitString($string, $limit)
{
    $rsString = $string;

    if (strlen($string) > $limit) {
        $rsString = substr($string, 0, $limit - 3) . "...";
    }

    return $rsString;
}
