<?php

namespace App\Http\DTO\Admin\Merchant;

use App\Utils\ParserUtility\Entities\AbstractEntity;
use App\Utils\ParserUtility\Exceptions\ParseException;

class StoreMerchantDTO extends AbstractEntity
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
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
