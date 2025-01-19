<?php

namespace App\Http\Helpers;

class FloatConvert {
    public $string;
    public $number;

    static function to_int($fraction) {
        return $fraction * 100; // 1 * 100 = 100; 1.5 * 100 = 150; .25 * 100 = 25. etc.
    }

    static function to_dec($n) {
        return $n / 100; // 200 / 100 = 2; 1 / 100 = .01; 25 / 100 = .25; etc.
    }
}
