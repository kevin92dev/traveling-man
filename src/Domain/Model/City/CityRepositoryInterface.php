<?php

namespace App\Domain\Model\City;

interface CityRepositoryInterface
{
    public function findAll(): array;
}
