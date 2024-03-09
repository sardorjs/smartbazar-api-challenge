<?php

namespace Tests\Http\UseCases\Admin\City;

use App\Http\DTO\Admin\City\StoreCityDTO;
use App\Http\UseCases\Admin\City\StoreCityUseCase;
use App\Models\City;
use App\Repositories\City\CityRepositoryInterface;
use App\Utils\ParserUtility\Exceptions\ParseException;
use Illuminate\Http\RedirectResponse;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class StoreCityUseCaseTest extends TestCase
{
    private CityRepositoryInterface $cityRepository;
    private StoreCityUseCase $storeCityUseCase;

    /**
     * @return void
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->cityRepository = $this->createMock(CityRepositoryInterface::class);
        $this->storeCityUseCase = new StoreCityUseCase(
            cityRepository: $this->cityRepository
        );
    }

    /**
     * Успешный кейс!
     * @return void
     * @throws ParseException
     */
    public function testSuccess()
    {
        $name = 'string';
        $validatedRequest = [
            'name' => $name,
        ];

        $city = new City();
        $city->name = $name;


        $storeCityDTO = StoreCityDTO::fromArray($validatedRequest);

        $this->cityRepository->method('save')->willReturn($city);
        $response = $this->storeCityUseCase->execute($storeCityDTO);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertTrue($response->isRedirect(route('admin.city.index')));
        $this->assertTrue(session()->has('success'));
    }
}
