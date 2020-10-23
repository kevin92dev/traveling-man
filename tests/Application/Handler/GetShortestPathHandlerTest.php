<?php

namespace App\Tests\Application\Handler;

use Prophecy\Argument;
use PHPUnit\Framework\TestCase;
use App\Domain\Model\City\City;
use App\Domain\Model\Coordinates\Coordinates;
use App\Application\Handler\GetShortestPathHandler;
use App\Infrastructure\Domain\City\CityCSVRepository;
use App\Domain\Service\Algorithm\NearestNeighbourAlgorithm;

class GetShortestPathHandlerTest extends TestCase
{
    public function testHandle()
    {
        $vendrellCoordinates = new Coordinates(41.2167, 1.5333);
        $vendrellCity = new City('El Vendrell', $vendrellCoordinates);

        $bcnCoordinates = new Coordinates(41.38879, 2.15899);
        $bcnCity = new City('Barcelona', $bcnCoordinates);

        $cities = [];
        $cities[] = $vendrellCity;
        $cities[] = $bcnCity;

        $repository = $this->prophesize(CityCSVRepository::class);
        $algorithm = $this->prophesize(NearestNeighbourAlgorithm::class);

        $repository
            ->findAll()
            ->shouldBeCalled()
            ->willReturn($cities);

        $algorithm
            ->getTour(Argument::type('array'))
            ->shouldBeCalled()
            ->willReturn([]);

        $handler = new GetShortestPathHandler(
            $repository->reveal(),
            $algorithm->reveal()
        );

        $this->assertIsArray($handler->handle());
    }
}
