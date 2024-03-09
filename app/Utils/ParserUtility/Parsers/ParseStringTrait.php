<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

use App\Utils\ParserUtility\Exceptions\ParseException;
use Exception;

trait ParseStringTrait
{
    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @return string|null
     * @throws ParseException
     */
    protected static function parseNullableString(mixed &$value): ?string
    {
        try {
            if ($value === null) {
                return null;
            }

            return (string) $value;
        } catch (Exception $error) {
            throw new ParseException('Parse string failed');
        }
    }

    /** @description Reference(&) needed for passing Undefined array keys *
     * @param mixed $value
     * @param string|null $defaultValue
     * @return string
     * @throws ParseException
     */
    protected static function parseString(mixed &$value, ?string $defaultValue = null): string
    {
        $castedValue = self::parseNullableString($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse string value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
