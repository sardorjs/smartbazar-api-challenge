<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

use App\Utils\ParserUtility\Entities\AbstractEntity;
use App\Utils\ParserUtility\Exceptions\ParseException;

trait ParseEntityTrait
{
    use ParseArrayTrait;

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @return T
     * @throws ParseException
     */
    protected static function parseNullableEntity(string $className, mixed &$value)
    {
        $parsedValue = self::parseNullableArray($value);
        if ($parsedValue === null) {
            return null;
        }

        if (!is_subclass_of($className, AbstractEntity::class)) {
            throw new ParseException($className . ' is not instance of ' . AbstractEntity::class);
        }


        return $className::fromArray($parsedValue);
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @param T|null $defaultValue
     * @throws ParseException
     */
    protected static function parseEntity(string $className, mixed &$value, mixed $defaultValue = null): mixed
    {
        $castedValue = self::parseNullableEntity($className, $value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse entity value required');
            }
            return $defaultValue;
        }
        return $castedValue;
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @return array<T>|null
     * @throws ParseException
     */
    protected static function parseNullableEntityList(string $className, mixed &$value): ?array
    {
        $parsedValues = self::parseNullableArray($value);
        if ($parsedValues === null) {
            return null;
        }

        $result = [];
        foreach ($parsedValues as $parsedValue) {
            $result[] = self::parseEntity($className, $parsedValue);
        }

        return $result;
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @template T
     * @param class-string<T> $className
     * @param array<T>|null $defaultValue
     * @return array<T>&!null
     * @throws ParseException
     */
    protected static function parseEntityList(string $className, mixed &$value, array $defaultValue = null): array
    {
        $castedValue = self::parseNullableEntityList($className, $value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse entity value required');
            }
            return $defaultValue;
        }
        return $castedValue;
    }
}
