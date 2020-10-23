<?php

namespace App\Application\Handler;

use App\Domain\Model\City\CityRepositoryInterface;
use App\Domain\Service\Algorithm\AlgorithmInterface;

class GetShortestPathHandler
{
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * @var AlgorithmInterface
     */
    private $algorithm;

    /**
     * GetShortestPathHandler constructor.
     *
     * @param CityRepositoryInterface $cityRepository
     * @param AlgorithmInterface $algorithm
     */
    public function __construct(
        CityRepositoryInterface $cityRepository,
        AlgorithmInterface $algorithm
    ) {
        $this->cityRepository = $cityRepository;
        $this->algorithm = $algorithm;
    }

    /**
     * GetShortestPathHandler constructor.
     *
     * @return array
     */
    public function handle(): array
    {
        $cities = $this->cityRepository->findAll();

        return $this->algorithm->getTour($cities);
    }
}
