<?php

declare(strict_types=1);

namespace App\FactoryObject\Notifier\MorseCode;

use App\Interface\Notifier\MessageHandlerInterface;
use Cocur\Slugify\Slugify;
use Morse\Text;

use function strtoupper;

class MessageHandler implements MessageHandlerInterface
{
    public function prepare(string $message): string
    {
        $slugify = new Slugify();
        $slugified = $slugify->slugify($message, ' ');

        $morseTranslator = new Text();

        return $morseTranslator->toMorse($slugified);
    }
}
