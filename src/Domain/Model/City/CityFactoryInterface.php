<?php

namespace App\Domain\Model\City;

interface CityFactoryInterface
{
    public function create(string $name, string $xCoordinate, string $yCoordinate): City;
}