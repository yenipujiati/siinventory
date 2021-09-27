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

<<<<<<< HEAD
=======
    public static function lowercaseConverter($text) {
        return strtolower($text);
    }

    public static function uppercaseConverter($text) {
        return strtoupper($text);
    }
>>>>>>> 7cdc8eb7d19191fda3b91032d23c786f91f34e10
}
