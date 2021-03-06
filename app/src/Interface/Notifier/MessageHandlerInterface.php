<?php

declare(strict_types=1);

namespace App\Interface\Notifier;

interface MessageHandlerInterface
{
    public function prepare(string $message): string;
}
