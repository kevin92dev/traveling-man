<?php

namespace App\Application\Handler;

use App\Application\Command\GetShortestPathCommand;
use App\Domain\Model\City\CityRepositoryInterface;

class GetShortestPathHandler
{
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * GetShortestPathHandler constructor.
     *
     * @param CityRepositoryInterface $cityRepository
     */
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
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

        var_dump($cities[0]);
        exit;
    }
}
