<?php

namespace App\Domain\Service\Algorithm;

use App\Domain\Model\City\City;

class NearestNeighbourAlgorithm implements AlgorithmInterface
{
    /**
     * @var array
     */
    private $visitedCities;

    /**
     * @var array
     */
    private $unvisitedCities;

    /**
     * NearestNeighbourAlgorithm constructor.
     */
    public function __construct()
    {
        $this->visitedCities = [];
        $this->unvisitedCities = [];
    }

    /**
     * @param array $destinations
     *
     * @return array
     */
    public function getTour(array $destinations): array
    {
        $this->unvisitedCities = $destinations;
        $totalCitiesToVisit = count($this->unvisitedCities);

        $route = [$this->unvisitedCities[0]];

        do {
            $vertex = end($route);

            $this->visitedCities[] = $vertex;
            $this->unvisitedCities = array_diff($this->unvisitedCities, $this->visitedCities);

            $route[] = $this->getNearestUnvisitedCityFrom($vertex);
        } while (($totalCitiesToVisit-1) > count($this->visitedCities));

        return $route;
    }

    /**
     * @param City $city
     *
     * @return City|null
     */
    private function getNearestUnvisitedCityFrom(City $city): ?City
    {
        $nearestCity = new \stdClass();
        $nearestCity->city = null;
        $nearestCity->distance = null;

        foreach ($this->unvisitedCities as $key => $unvisitedCity) {
            if ($city == $unvisitedCity) {
                continue;
            }

            $distance = $city->getDistanceTo($unvisitedCity);

            if (is_null($nearestCity->city)) {
                $nearestCity->city = $unvisitedCity;
                $nearestCity->distance = $distance;
                continue;
            }

            if ($nearestCity->distance > $distance) {
                $nearestCity->city = $unvisitedCity;
                $nearestCity->distance = $distance;
            }
        }

        return $nearestCity->city;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Nearest Neighbour algorithm';
    }
}
