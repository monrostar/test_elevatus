<?php

namespace App\Unit;

use App\Services\DistanceService;
use App\Services\HammingAlgorithmProvider;
use App\Services\LevenshteinAlgorithmProvider;
use PHPUnit\Framework\TestCase;


class DistanceServiceTestCase {
    protected string $a;
    protected string $b;
    protected int $result;

    public function __construct(string $a, string $b, int $result)
    {
        $this->a = $a;
        $this->b = $b;
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getA(): string
    {
        return $this->a;
    }

    /**
     * @return string
     */
    public function getB(): string
    {
        return $this->b;
    }

    /**
     * @return int
     */
    public function getResult(): int
    {
        return $this->result;
    }
}

class DistanceServiceTest extends TestCase
{

    public function test_hamming()
    {
        $distanceService = new DistanceService(new HammingAlgorithmProvider());

        $testCases = [
            new DistanceServiceTestCase("this is a test", "this is test", 6),
            new DistanceServiceTestCase("this is a test", "the is test", 11),
        ];

        foreach ($testCases as $case) {
            $result = $distanceService->getDistance($case->getA(), $case->getB());
            $this->assertEquals($case->getResult(), $result);
        }
    }

    public function test_levenshtain() {
        $distanceService = new DistanceService(new LevenshteinAlgorithmProvider());

        $testCases = [
            new DistanceServiceTestCase("this is a test", "this is test", 2),
            new DistanceServiceTestCase("this is a test", "the is test", 4),
        ];

        foreach ($testCases as $case) {
            $result = $distanceService->getDistance($case->getA(), $case->getB());
            $this->assertEquals($case->getResult(), $result);
        }
    }
}
