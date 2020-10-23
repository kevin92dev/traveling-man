<?php

namespace App\Tests\Domain\Service\Algorithm;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\City\City;
use App\Domain\Model\Coordinates\Coordinates;
use App\Domain\Service\Algorithm\NearestNeighbourAlgorithm;

class NearestNeighbourAlgorithmTest extends TestCase
{
    public function testGetTourFirst()
    {
        $vendrellCoordinates = new Coordinates(41.2167, 1.5333);
        $vendrellCity = new City('El Vendrell', $vendrellCoordinates);

        $bcnCoordinates = new Coordinates(41.38879, 2.15899);
        $bcnCity = new City('Barcelona', $bcnCoordinates);

        $vngCoordinates = new Coordinates(41.2333, 1.7333);
        $vngCity = new City('Vilanova i la Geltrú', $vngCoordinates);

        $vdpCoordinates = new Coordinates(41.3500, 1.7000);
        $vdpCity = new City('Vilafranca del Penedès', $vdpCoordinates);

        $destinations = [];
        $destinations[] = $vendrellCity;
        $destinations[] = $bcnCity;
        $destinations[] = $vngCity;
        $destinations[] = $vdpCity;

        $service = new NearestNeighbourAlgorithm();

        $optimumRoute = [];
        $optimumRoute[] = $vendrellCity;
        $optimumRoute[] = $vngCity;
        $optimumRoute[] = $vdpCity;
        $optimumRoute[] = $bcnCity;

        $this->assertEquals($optimumRoute, $service->getTour($destinations));
    }

    public function testGetTourSecond()
    {
        $vendrellCoordinates = new Coordinates(41.2167, 1.5333);
        $vendrellCity = new City('El Vendrell', $vendrellCoordinates);

        $bcnCoordinates = new Coordinates(41.38879, 2.15899);
        $bcnCity = new City('Barcelona', $bcnCoordinates);

        $vngCoordinates = new Coordinates(41.2333, 1.7333);
        $vngCity = new City('Vilanova i la Geltrú', $vngCoordinates);

        $vdpCoordinates = new Coordinates(41.3500, 1.7000);
        $vdpCity = new City('Vilafranca del Penedès', $vdpCoordinates);

        $destinations = [];
        $destinations[] = $vdpCity;
        $destinations[] = $vngCity;
        $destinations[] = $bcnCity;
        $destinations[] = $vendrellCity;

        $service = new NearestNeighbourAlgorithm();

        $optimumRoute = [];
        $optimumRoute[] = $vdpCity;
        $optimumRoute[] = $vngCity;
        $optimumRoute[] = $vendrellCity;
        $optimumRoute[] = $bcnCity;

        $this->assertEquals($optimumRoute, $service->getTour($destinations));
    }
}
