<?php

namespace App\Domain\Model\Coordinates;

/**
 * Class Coordinates
 *
 * @package App\Domain\Model\Coordinates
 */
class Coordinates
{
    /**
     * @var float
     */
    private $xCoordinate;

    /**
     * @var float
     */
    private $yCoordinate;

    /**
     * Coordinates constructor.
     *
     * @param float $xCoordinate
     * @param float $yCoordinate
     */
    public function __construct(float $xCoordinate, float $yCoordinate)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
    }

    /**
     * @return float
     */
    public function getXCoordinate(): ?float
    {
        return $this->xCoordinate;
    }

    /**
     * @return float
     */
    public function getYCoordinate(): ?float
    {
        return $this->yCoordinate;
    }
}
