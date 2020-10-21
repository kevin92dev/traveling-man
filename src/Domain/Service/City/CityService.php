<?php

namespace App\Domain\Service\City;

use App\Domain\Model\Coordinates\Coordinates;

class CityService
{
    public function circleDistance(
        Coordinates $coordinates1,
        Coordinates $coordinates2
    ) {
        $lat1 = $coordinates1->getLatitude();
        $lon1 = $coordinates1->getLongitude();
        $lat2 = $coordinates2->getLatitude();
        $lon2 = $coordinates2->getLongitude();

        $rad = M_PI / 180;

        return acos(sin($lat2*$rad) * sin($lat1*$rad) + cos($lat2*$rad) * cos($lat1*$rad) * cos($lon2*$rad - $lon1*$rad));// Kilometers
    }
}
