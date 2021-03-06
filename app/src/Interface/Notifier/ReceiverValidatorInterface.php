<?php

declare(strict_types=1);

namespace App\Interface\Notifier;

interface ReceiverValidatorInterface
{
    public function isValid(string $receiver): bool;
}
