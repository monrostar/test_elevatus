<?php

namespace App\Http\Controllers;

use App\Services\DistanceService;
use App\Services\HammingAlgorithmProvider;
use App\Services\LevenshteinAlgorithmProvider;
use Illuminate\Container\Container;
use Illuminate\Http\Request;

class DistanceAlgorithm extends Controller
{

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function index()
    {
        return view("welcome");
    }


    public function getDistance(Request $request)
    {
        $a = $request->input('a', '');
        $b = $request->input('b', '');
        $algorithm = $request->input('algorithm', 'hamming');

        $availableAlgorithms = [
            'hamming' => $this->container->get(HammingAlgorithmProvider::class),
            'levenshtein' => $this->container->get(LevenshteinAlgorithmProvider::class)
        ];

        if (in_array($algorithm, $availableAlgorithms)) {
            return view("welcome");
        }

        /** @var DistanceService $distanceService */
        $distanceService = $availableAlgorithms[$algorithm];

        $result = $distanceService->getDistance($a, $b);

        dump($result, $a, $b);
        return view("welcome", ['distance' => $result]);
    }
}
