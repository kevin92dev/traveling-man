<?php

namespace App\Domain\Model\City;

interface CityFactoryInterface
{
    public function create(string $name, string $latitude, string $longitude): City;
}