<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

use App\Utils\ParserUtility\Exceptions\ParseException;
use Exception;

trait ParseIntTrait
{
    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @return int|null
     * @throws ParseException
     */
    protected static function parseNullableInt(mixed &$value): ?int
    {
        try {
            if ((string) $value === '0') {
                return 0;
            }

            return empty($value) ? null : (int) $value;
        } catch (Exception $exception) {
            throw new ParseException('Parse int failed');
        }
    }

    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @param int|null $defaultValue
     * @return int
     * @throws ParseException
     */
    protected static function parseInt(mixed &$value, ?int $defaultValue = null): int
    {
        $castedValue = self::parseNullableInt($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse int value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
