<?php

namespace App\Services;

use App\Services\Math\Distance\HammingAlgorithm;

interface DistanceAlgorithmProvider
{
    /**
     * @param string $a
     * @param string $b
     * @return int
     */
    public function getDistance(string $a, string $b): int;
}


class HammingAlgorithmProvider implements DistanceAlgorithmProvider
{
    protected HammingAlgorithm $hamming;

    public function __construct()
    {
        $this->hamming = new HammingAlgorithm();
    }

    public function getDistance(string $a, string $b): int
    {
        return $this->hamming->distance($a, $b);
    }
}

class LevenshteinAlgorithmProvider implements DistanceAlgorithmProvider
{
    public function getDistance(string $a, string $b): int
    {
        return levenshtein($a, $b);
    }

}

class DistanceService
{
    protected DistanceAlgorithmProvider $distanceAlgorithmProvider;

    /**
     * @param DistanceAlgorithmProvider $distanceAlgorithmProvider
     */
    public function __construct(DistanceAlgorithmProvider $distanceAlgorithmProvider)
    {
        $this->distanceAlgorithmProvider = $distanceAlgorithmProvider;
    }

    public function getDistance(string $a, string $b): int
    {
        return $this->distanceAlgorithmProvider->getDistance($a, $b);
    }

}
