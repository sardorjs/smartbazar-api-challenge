<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

use App\Utils\ParserUtility\Exceptions\ParseException;
use Exception;

trait ParseBoolTrait
{
    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @return bool|null
     * @throws ParseException
     */
    protected static function parseNullableBool(mixed &$value): ?bool
    {
        try {
            if ($value === null) {
                return null;
            }

            return (bool) $value;
        } catch (Exception $exception) {
            throw new ParseException('Parse bool failed');
        }
    }

    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @param bool|null $defaultValue
     * @return bool
     * @throws ParseException
     */
    protected static function parseBool(mixed &$value, ?bool $defaultValue = null): bool
    {
        $castedValue = self::parseNullableBool($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse bool value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
