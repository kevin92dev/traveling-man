<?php

namespace App\Domain\Service\Algorithm;

interface AlgorithmInterface
{
    /**
     * @param array $destinations
     *
     * @return array
     */
    public function getTour(array $destinations): array;

    /**
     * @return string
     */
    public function getName(): string;
}
