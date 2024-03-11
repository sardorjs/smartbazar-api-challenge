<?php

namespace App\Http\DTO\Admin\Shop;

use App\Utils\ParserUtility\Entities\AbstractEntity;
use App\Utils\ParserUtility\Exceptions\ParseException;

class StoreShopDTO extends AbstractEntity
{

    /**
     * @param int $city_id
     * @param string $name
     */
    public function __construct(
        private readonly int $city_id,
        private readonly string $name,
    ) {}

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->city_id;
    }

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
            city_id: self::parseInt($data['city_id']),
            name: self::parseString($data['name']),
        );
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'city_id' => $this->city_id,
            'name' => $this->name,
        ];
    }
}
