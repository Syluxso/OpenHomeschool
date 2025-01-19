<?php

namespace App\Http\Helpers;

class NumberFormat {

    static function clean($string) {
        return str_replace(',', '', $string);
    }

    static function pretty($string) {
        $string = NumberFormat::clean($string);
        return number_format($string,0, '.', ',');
    }

    static function pretty_dec($string) {
        $string = NumberFormat::clean($string);
        return number_format($string,2, '.', ',');
    }

    static function pretty_dollar($string) {
        return '$' . NumberFormat::pretty($string);
    }
}

