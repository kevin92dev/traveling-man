<?php

namespace App\Infrastructure\Domain\City;

use App\Domain\Model\City\CityFactoryInterface;
use App\Domain\Model\City\CityRepositoryInterface;

class CityCSVRepository implements CityRepositoryInterface
{
    /**
     * @var CityFactoryInterface
     */
    private $cityFactory;

    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var string
     */
    private $importFile;

    /**
     * ReadingCSVRepository constructor.
     *
     * @param CityFactoryInterface $cityFactory
     * @param $projectDir
     * @param $importFile
     */
    public function __construct(CityFactoryInterface $cityFactory, $projectDir, $importFile)
    {
        $this->cityFactory = $cityFactory;
        $this->projectDir = $projectDir;
        $this->importFile = $importFile;
    }

    public function findAll(): array
    {
        $cities = [];

        $filePath = $this->projectDir.'/public/'.$this->importFile;

        if (($manager = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($manager, 1000, ';')) !== FALSE) {
                $name = $data[0];
                $latitude = $data[1];
                $longitude = $data[2];

                $city = $this->cityFactory->create(
                    $name,
                    $latitude,
                    $longitude
                );

                $cities[] = $city;
            }

            fclose($manager);
        }

        return $cities;
    }
}
