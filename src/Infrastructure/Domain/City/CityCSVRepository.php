<?php

namespace App\Infrastructure\Domain\City;

use App\Domain\Model\City\CityFactoryInterface;
use App\Domain\Model\City\CityRepositoryInterface;

class CityCSVRepository implements CityRepositoryInterface
{
    const CITIES_FILE = 'cities.txt';

    /**
     * @var CityFactoryInterface
     */
    private $cityFactory;

    /**
     * @var string
     */
    private $projectDir;

    /**
     * ReadingCSVRepository constructor.
     *
     * @param CityFactoryInterface $cityFactory
     * @param $projectDir
     */
    public function __construct(CityFactoryInterface $cityFactory, $projectDir)
    {
        $this->cityFactory = $cityFactory;
        $this->projectDir = $projectDir;
    }

    public function findAll(): array
    {
        $cities = [];

        $filePath = $this->projectDir.'/public/'.self::CITIES_FILE;

        if (($manager = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($manager, 1000, ';')) !== FALSE) {
                $name = $data[0];
                $xCoordinate = $data[1];
                $yCoordinate = $data[2];

                $city = $this->cityFactory->create(
                    $name,
                    $xCoordinate,
                    $yCoordinate
                );

                $cities[] = $city;
            }

            fclose($manager);
        }

        return $cities;
    }
}
