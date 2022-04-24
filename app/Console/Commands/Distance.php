<?php

namespace App\Console\Commands;

use App\Services\DistanceAlgorithmProvider;
use App\Services\DistanceService;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

abstract class Distance extends Command
{
    protected Container $container;
    protected string $distanceAlgorithmProviderClass;

    public function __construct(Container $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected abstract function getDistanceAlgorithmProviderClass(): string;

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function getDistanceService(): DistanceService {
        return $this->container->get($this->getDistanceAlgorithmProviderClass());
    }

    public function handle(): int
    {
        $result = $this->getDistanceService()->getDistance(
            $this->argument('string1'),
            $this->argument('string2')
        );

        $this->line("Distance: $result");
        return 0;
    }

}
