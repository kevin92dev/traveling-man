<?php

namespace App\Tests\Infrastructure\Domain\Coordinates;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\Coordinates\Coordinates;
use App\Infrastructure\Domain\Coordinates\CoordinatesFactory;

class CoordinatesFactoryTest extends TestCase
{
    public function testCreate()
    {
        $latitude = 41.2167;
        $longitude = 1.5333;

        $coordinates = new Coordinates($latitude, $longitude);

        $factory = new CoordinatesFactory();

        $this->assertEquals($coordinates, $factory->create($latitude, $longitude));
    }
}
