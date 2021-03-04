<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\FactoryTypeEnum;
use App\Exception\UnsupportedFactoryTypeException;
use App\Factory\MuscleGainTrainingFactory;
use App\Factory\WeightLossTrainingFactory;
use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class TrainingFactoryLocator implements ServiceSubscriberInterface
{
    private ContainerInterface $locator;

    public function __construct(ContainerInterface $locator)
    {
        $this->locator = $locator;
    }

    public static function getSubscribedServices(): array
    {
        return [
            FactoryTypeEnum::MUSCLE_GAIN => MuscleGainTrainingFactory::class,
            FactoryTypeEnum::WEIGHT_LOSS => WeightLossTrainingFactory::class,
        ];
    }

    public function locate(string $serviceName)
    {
        if ($this->locator->has($serviceName)) {
            return $this->locator->get($serviceName);
        }

        throw new UnsupportedFactoryTypeException($serviceName);
    }
}
