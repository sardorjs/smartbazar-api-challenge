<?php

namespace App\Utils\ParserUtility\Entities;

use App\Utils\ParserUtility\Parsers\ParseDataTrait;
use JsonSerializable;

abstract class AbstractEntity implements JsonSerializable
{
    use ParseDataTrait;

    /**
     * @param array $data
     * @return static
     */
    abstract public static function fromArray(array $data): static;
}
