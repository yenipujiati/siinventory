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
    public static function lowercaseConverter($text) {
        return strtolower($text);
    }

    public static function uppercaseConverter($text) {
        return strtoupper($text);
    }
    public static function active($status){
        return($status== 1) ? "Aktif ": "Tidak Aktif";

    }
}
