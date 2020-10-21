<?php

namespace App\Infrastructure\Domain\City;

use App\Domain\Model\City\City;
use App\Domain\Model\City\CityFactoryInterface;
use App\Domain\Model\Coordinates\CoordinatesFactoryInterface;

class CityFactory implements CityFactoryInterface
{
    /**
     * @var CoordinatesFactoryInterface
     */
    private $coordinatesFactory;

    /**
     * CityFactory constructor.
     *
     * @param CoordinatesFactoryInterface $coordinatesFactory
     */
    public function __construct(CoordinatesFactoryInterface $coordinatesFactory)
    {
        $this->coordinatesFactory = $coordinatesFactory;
    }

    /**
     * @param string $name
     * @param string $xCoordinate
     * @param string $yCoordinate
     *
     * @return City
     */
    public function create(string $name, string $xCoordinate, string $yCoordinate): City
    {
        $coordinates = $this->coordinatesFactory->create((float) $xCoordinate, (float) $yCoordinate);

        return new City($name, $coordinates);
    }
}