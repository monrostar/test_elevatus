<?php

namespace App\Console\Commands;

use App\Services\HammingAlgorithmProvider;
use Illuminate\Console\Command;

class GetHammingDistance extends Distance
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'distance:hamming {string1} {string2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected function getDistanceAlgorithmProviderClass(): string
    {
        return HammingAlgorithmProvider::class;
    }
}
