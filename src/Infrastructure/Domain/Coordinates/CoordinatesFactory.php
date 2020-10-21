<?php

namespace App\Infrastructure\Domain\Coordinates;

use App\Domain\Model\Coordinates\Coordinates;
use App\Domain\Model\Coordinates\CoordinatesFactoryInterface;

class CoordinatesFactory implements CoordinatesFactoryInterface
{
    public function create(float $latitude, float $longitude): Coordinates
    {
        return new Coordinates($latitude, $longitude);
    }
}
