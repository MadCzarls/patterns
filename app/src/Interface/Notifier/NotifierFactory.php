<?php

declare(strict_types=1);

namespace App\Interface\Notifier;

use App\Enum\NotifierFactoryTypeEnum;

interface NotifierFactory
{
    public function getName(): NotifierFactoryTypeEnum;

    public function getMessageHandler(): MessageHandlerInterface;

    public function getReceiverValidator(): ReceiverValidatorInterface;
}
