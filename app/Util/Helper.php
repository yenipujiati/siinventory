<?php


namespace App\Util;


class Helper
{
    public static function dateConverter($date) {
        return date('m/d/Y',  strtotime($date));
    }

    public static function rupiahConverter($number) {
        return "Rp".number_format($number,2,',',',');
    }
}
