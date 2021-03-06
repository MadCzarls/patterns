<?php

declare(strict_types=1);

namespace App\Service\Notifier;

use App\Enum\NotifierFactoryTypeEnum;
use App\Exception\UnsupportedFactoryTypeException;
use App\Factory\Notifier\MorseCodeFactory;
use App\Factory\Notifier\PagerFactory;
use App\Factory\Notifier\SmsFactory;
use App\Interface\Notifier\NotifierFactory;
use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class FactoryLocator implements ServiceSubscriberInterface
{
    private ContainerInterface $locator;

    public function __construct(ContainerInterface $locator)
    {
        $this->locator = $locator;
    }

    public static function getSubscribedServices(): array
    {
        return [
            NotifierFactoryTypeEnum::MORSE_CODE => MorseCodeFactory::class,
            NotifierFactoryTypeEnum::SMS => SmsFactory::class,
            NotifierFactoryTypeEnum::PAGER => PagerFactory::class,
        ];
    }

    public function locate(string $serviceName): NotifierFactory
    {
        if ($this->locator->has($serviceName)) {
            return $this->locator->get($serviceName);
        }

        throw new UnsupportedFactoryTypeException($serviceName);
    }
}
