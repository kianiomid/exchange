<?php
/**
 * Created by PhpStorm.
 * User: omid
 * Date: 2/8/21
 * Time: 10:49 PM
 */

namespace App\Helpers;


class Util
{
    /**
     * @param $string
     * @return mixed
     */
    public static function convert_to_english_numbers($string)
    {
        $persianDigit = ['۰', '۱', '۲', '۳', '٤', '٥', '٦', '۷', '۸', '۹'];
        $englishDigit = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $englishNumber = str_replace($persianDigit, $englishDigit, $string);

        return $englishNumber;
    }

    /**
     * @param $bytes
     * @return string
     * @throws \Exception
     */
    public static function generate_random_string($bytes)
    {
        $result = bin2hex(random_bytes($bytes));
        return $result;
    }

}