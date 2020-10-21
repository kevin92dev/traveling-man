<?php

namespace App\Domain\Model\Coordinates;

interface CoordinatesFactoryInterface
{
    public function create(float $latitude, float $longitude): Coordinates;
}