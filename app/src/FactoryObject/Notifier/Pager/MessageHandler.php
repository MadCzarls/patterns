<?php

declare(strict_types=1);

namespace App\FactoryObject\Notifier\Pager;

use App\Interface\Notifier\MessageHandlerInterface;
use Cocur\Slugify\Slugify;

use function strtoupper;
use function substr;

class MessageHandler implements MessageHandlerInterface
{
    private const MESSAGE_LENGTH = 120;

    public function prepare(string $message): string
    {
        $slugify = new Slugify();
        $slugified = $slugify->slugify($message, ' ');

        return strtoupper(substr($slugified, 0, self::MESSAGE_LENGTH));
    }
}
