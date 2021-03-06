<?php

declare(strict_types=1);

namespace App\Factory\Notifier;

use App\Enum\NotifierFactoryTypeEnum;
use App\FactoryObject\Notifier\Pager\MessageHandler;
use App\FactoryObject\Notifier\Pager\ReceiverValidator;
use App\Interface\Notifier\MessageHandlerInterface;
use App\Interface\Notifier\NotifierFactory;
use App\Interface\Notifier\ReceiverValidatorInterface;
use JetBrains\PhpStorm\Pure;

class PagerFactory implements NotifierFactory
{
    #[Pure] public function getName(): NotifierFactoryTypeEnum
    {
        return new NotifierFactoryTypeEnum(NotifierFactoryTypeEnum::PAGER);
    }

    #[Pure] public function getMessageHandler(): MessageHandlerInterface
    {
        return new MessageHandler();
    }

    #[Pure] public function getReceiverValidator(): ReceiverValidatorInterface
    {
        return new ReceiverValidator();
    }
}
