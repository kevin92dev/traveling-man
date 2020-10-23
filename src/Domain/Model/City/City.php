<?php

namespace App\Domain\Model\City;

use App\Domain\Model\Coordinates\Coordinates;

class City
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Coordinates
     */
    private $coordinates;

    /**
     * Client constructor.
     *
     * @param string $name
     * @param Coordinates $coordinates
     */
    public function __construct(string $name, Coordinates $coordinates)
    {
        $this->name = $name;
        $this->coordinates = $coordinates;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param City $city
     *
     * @return float
     */
    public function getDistanceTo(City $city): float
    {
        $cityCoordinates = $city->getCoordinates();

        $lat1 = $this->coordinates->getLatitude();
        $lon1 = $this->coordinates->getLongitude();
        $lat2 = $cityCoordinates->getLatitude();
        $lon2 = $cityCoordinates->getLongitude();

        $rad = M_PI / 180;

        return (float) acos(sin($lat2*$rad) * sin($lat1*$rad) + cos($lat2*$rad) * cos($lat1*$rad) * cos($lon2*$rad - $lon1*$rad)) * 6371;
    }

    public function __toString()
    {
        return $this->name;
    }
}
