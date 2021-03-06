<?php

declare(strict_types=1);

namespace App\FactoryObject\Notifier\Sms;

use App\Interface\Notifier\MessageHandlerInterface;

use function substr;

class MessageHandler implements MessageHandlerInterface
{
    private const MESSAGE_LENGTH = 160;

    public function prepare(string $message): string
    {
        return substr($message, 0, self::MESSAGE_LENGTH);
    }
}
