<?php

namespace App\Tests\Infrastructure\Domain\City;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\City\City;
use App\Domain\Model\Coordinates\Coordinates;
use App\Infrastructure\Domain\City\CityFactory;
use App\Infrastructure\Domain\Coordinates\CoordinatesFactory;

class CityFactoryTest extends TestCase
{
    public function testCreate()
    {
        $latitude = 41.2167;
        $longitude = 1.5333;

        $coordinates = new Coordinates($latitude, $longitude);

        $coordinatesFactory = $this->prophesize(CoordinatesFactory::class);

        $coordinatesFactory
            ->create($latitude, $longitude)
            ->shouldBeCalled()
            ->willReturn($coordinates);

        $cityFactory = new CityFactory($coordinatesFactory->reveal());

        $city = new City('El Vendrell', $coordinates);

        $this->assertEquals($city, $cityFactory->create('El Vendrell', $latitude, $longitude));
    }
}
