<?php

namespace App\Tests\Domain\Model\City;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\City\City;
use App\Domain\Model\Coordinates\Coordinates;

class CityTest extends TestCase
{
    public function testGetDistanceTo()
    {
        $vendrellCoordinates = new Coordinates(41.2167, 1.5333);
        $vendrellCity = new City('El Vendrell', $vendrellCoordinates);

        $bcnCoordinates = new Coordinates(41.38879, 2.15899);
        $bcnCity = new City('Barcelona', $bcnCoordinates);

        $this->assertGreaterThan(50, $vendrellCity->getDistanceTo($bcnCity));
        $this->assertLessThan(60, $vendrellCity->getDistanceTo($bcnCity));
        $this->assertIsFloat($vendrellCity->getDistanceTo($bcnCity));
    }
}
