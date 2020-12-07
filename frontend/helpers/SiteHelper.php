<?php

namespace frontend\helpers;

use DateTime;

class SiteHelper
{
    public static function array_first($array, $default = null)
    {
        foreach ($array as $item) {
            return $item;
        }
        return $default;
    }

    /**
     * Выбирает слово с правильными окончанием после числительного.
     *
     * @param int $number число
     * @param array $words варианты склонений ['яблоко', 'яблока', 'яблок']
     * @return string
     */
    public static function plural($number, $words)
    {
        return $words[($number % 100 > 4 && $number % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][min($number % 10, 5)]];
    }

    public static function diffInYears($date)
    {
        $now = new DateTime();
        $date = DateTime::createFromFormat("Y-m-d", $date);
        $interval = $now->diff($date);
        return $interval->y;
    }

}
