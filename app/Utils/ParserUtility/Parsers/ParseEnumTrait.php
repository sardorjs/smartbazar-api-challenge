<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

use App\Utils\ParserUtility\Exceptions\ParseException;

trait ParseEnumTrait
{
    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @return T|null
     * @throws ParseException
     */
    protected static function parseNullableEnum(string $className, mixed &$value)
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Enum) {
            $value = $value->getValue();
        }

        if (!is_subclass_of($className, Enum::class)) {
            throw new ParseException($className . ' is not enum');
        }

        if (!$className::isValid($value)) {
            throw new ParseException('Wrong ' . $className . ' value: ' . $value);
        }

        return new $className($value);
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @return T&!null
     * @throws ParseException
     */
    protected static function parseEnum(string $className, mixed &$value, ?Enum $defaultValue = null)
    {
        $castedValue = self::parseNullableEnum($className, $value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse enum value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @param mixed $value
     * @return array<T>|null
     * @throws ParseException
     */
    protected static function parseNullableEnumList(string $className, mixed &$value): ?array
    {
        $parsedValues = self::parseNullableArray($value);
        if ($parsedValues === null) {
            return null;
        }

        $result = [];
        foreach ($parsedValues as $parsedValue) {
            $result[] = self::parseEnum($className, $parsedValue);
        }

        return $result;
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @param mixed $value
     * @param null $defaultValue
     * @return array<T>&!null
     * @throws ParseException
     */
    protected static function parseEnumList(string $className, mixed &$value, $defaultValue = null): array
    {
        $castedValue = self::parseNullableEnumList($className, $value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse enum list required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
