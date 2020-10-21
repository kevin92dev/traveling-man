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
}