<?php

namespace App\Domain\Model\Coordinates;

interface CoordinatesFactoryInterface
{
    public function create(float $xCoordinate, float $yCoordinate): Coordinates;
}