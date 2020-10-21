<?php

namespace App\Application\Handler;

use App\Application\Command\GetShortestPathCommand;
use App\Domain\Model\City\CityRepositoryInterface;
use App\Domain\Service\City\CityService;

class GetShortestPathHandler
{
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * @var CityService
     */
    private $cityService;

    /**
     * GetShortestPathHandler constructor.
     *
     * @param CityRepositoryInterface $cityRepository
     * @param CityService $cityService
     */
    public function __construct(CityRepositoryInterface $cityRepository, CityService $cityService)
    {
        $this->cityRepository = $cityRepository;
        $this->cityService = $cityService;
    }

    /**
     * GetShortestPathHandler constructor.
     *
     * @param GetShortestPathCommand $command
     *
     * @return array
     */
    public function handle(GetShortestPathCommand $command): array
    {
        $cities = $this->cityRepository->findAll();

        echo $this->cityService->circleDistance($cities[0]->getCoordinates(), $cities[1]->getCoordinates());

        //var_dump($cities[0]);
        exit;
    }
}
