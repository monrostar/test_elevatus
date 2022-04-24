<?php

namespace App\Services\Math\Distance;


use Exception;

/**
 * Implements the Hamming distance algorithm
 */

class HammingAlgorithm
{
    /**
     * Hamming distance between two strings
     *
     * The Hamming distance is defined as the number of positions
     * at which two strings of equal lenght differ
     *
     * Refs:
     * - http://mathworld.wolfram.com/HammingDistance.html
     * - http://en.wikipedia.org/wiki/Hamming_distance
     *
     * @param string $string1 first string
     * @param string $string2 second string
     *
     * @return integer the hamming length from string1 to string2
     *
     * @assert ('australopitecus', 'bird') throws Distance\IncompatibleItemsException
     * @assert ('1011101', '1001001') == 2
     * @assert ('chemistry', 'dentistry') == 4
     *
     */

    public function distance(string $string1, string $string2): int
    {
        $res = array_diff_assoc(str_split($string1), str_split($string2));
        return count($res);
    }
}
