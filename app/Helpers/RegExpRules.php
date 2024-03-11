<?php

namespace App\Helpers;

class RegExpRules
{
    /**
     * latitude from -90.0 to 90.0
     * @return string
     */
    public static function latitude(): string
    {
        return '/^[-+]?([1-8]?\d\.\d+|90\.0+)$/';
    }

    /**
     * longitude from -180.0 to 180.0
     * @return string
     */
    public static function longitude(): string
    {
        return '/^[-+]?((([1-9]?\d|1[0-7]\d)\.\d+)|180\.0+)$/';
    }

    /**
     * Phone Example: +14809888523, +12705838722, +13869134701
     * @return string
     */
    public static function phone(): string
    {
        return '/^\+[1-9]\d{1,14}$/';
    }


}
