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
     * @param string $latitude
     * @param string $longitude
     *
     * @return City
     */
    public function create(string $name, string $latitude, string $longitude): City
    {
        $coordinates = $this->coordinatesFactory->create((float) $latitude, (float) $longitude);

        return new City($name, $coordinates);
    }
}