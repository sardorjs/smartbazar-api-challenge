<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

use App\Utils\ParserUtility\Exceptions\ParseException;
use Carbon\Carbon;
use Exception;

trait ParseCarbonTrait
{
    use ParseStringTrait;

    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @return Carbon|null
     * @throws ParseException
     */
    protected static function parseNullableCarbon(mixed &$value): ?Carbon
    {
        try {
            $stringDate = self::parseNullableString($value);
            if ($stringDate === null) {
                return null;
            }

            return Carbon::parse($value)->tz(date_default_timezone_get());
        } catch (Exception $exception) {
            throw new ParseException('Parse invalid date time format');
        }

    }

    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @param Carbon|null $defaultValue
     * @return Carbon
     * @throws ParseException
     */
    protected static function parseCarbon(mixed &$value, ?Carbon $defaultValue = null): Carbon
    {
        $castedValue = self::parseNullableCarbon($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse Carbon value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
