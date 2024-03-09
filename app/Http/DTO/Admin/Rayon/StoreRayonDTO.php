<?php

namespace App\Http\DTO\Admin\Rayon;

use App\Utils\ParserUtility\Entities\AbstractEntity;
use App\Utils\ParserUtility\Exceptions\ParseException;

class StoreRayonDTO extends AbstractEntity
{

    /**
     * @param string $name
     */
    public function __construct(
        private readonly string $name,
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }



    /**
     * @param array $data
     * @return static
     * @throws ParseException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            name: self::parseString($data['name']),
        );
    }

    /**
     * @return string[]
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
