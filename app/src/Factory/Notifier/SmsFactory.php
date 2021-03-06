<?php

declare(strict_types=1);

namespace App\Factory\Notifier;

use App\Enum\NotifierFactoryTypeEnum;
use App\FactoryObject\Notifier\Sms\MessageHandler;
use App\FactoryObject\Notifier\Sms\ReceiverValidator;
use App\Interface\Notifier\MessageHandlerInterface;
use App\Interface\Notifier\NotifierFactory;
use App\Interface\Notifier\ReceiverValidatorInterface;
use JetBrains\PhpStorm\Pure;

class SmsFactory implements NotifierFactory
{
    #[Pure] public function getName(): NotifierFactoryTypeEnum
    {
        return new NotifierFactoryTypeEnum(NotifierFactoryTypeEnum::SMS);
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
