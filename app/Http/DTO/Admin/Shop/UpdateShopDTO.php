<?php

namespace App\Http\DTO\Admin\Shop;

use App\Utils\ParserUtility\Entities\AbstractEntity;
use App\Utils\ParserUtility\Exceptions\ParseException;

class UpdateShopDTO extends AbstractEntity
{
    /**
     * @param int $city_id
     * @param int $rayon_id
     * @param int $merchant_id
     * @param string $name
     * @param string $latitude
     * @param string $longitude
     * @param string|null $address
     * @param string|null $schedule
     * @param string|null $phone
     */
    public function __construct(
        private readonly int $city_id,
        private readonly int $rayon_id,
        private readonly int $merchant_id,
        private readonly string $name,
        private readonly string $latitude,
        private readonly string $longitude,
        private readonly ?string $address,
        private readonly ?string $schedule,
        private readonly ?string $phone,
    ) {}

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->city_id;
    }

    /**
     * @return int
     */
    public function getRayonId(): int
    {
        return $this->rayon_id;
    }

    /**
     * @return int
     */
    public function getMerchantId(): int
    {
        return $this->merchant_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
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
            rayon_id: self::parseInt($data['rayon_id']),
            merchant_id: self::parseInt($data['merchant_id']),
            name: self::parseString($data['name']),
            latitude: self::parseString($data['latitude']),
            longitude: self::parseString($data['longitude']),
            address: self::parseNullableString($data['address']),
            schedule: self::parseNullableString($data['schedule']),
            phone: self::parseNullableString($data['phone']),
        );
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'city_id' => $this->city_id,
            'rayon_id' => $this->rayon_id,
            'merchant_id' => $this->merchant_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'address' => $this->address,
            'schedule' => $this->schedule,
            'phone' => $this->phone,
        ];
    }
}
