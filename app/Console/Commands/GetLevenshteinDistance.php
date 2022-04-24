<?php

namespace App\Console\Commands;

use App\Services\HammingAlgorithmProvider;
use App\Services\LevenshteinAlgorithmProvider;
use Illuminate\Console\Command;

class GetLevenshteinDistance extends Distance
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'distance:levenshtein {string1} {string2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected function getDistanceAlgorithmProviderClass(): string
    {
        return LevenshteinAlgorithmProvider::class;
    }
}
