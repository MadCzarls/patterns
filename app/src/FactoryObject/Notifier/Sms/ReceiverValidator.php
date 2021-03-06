<?php

declare(strict_types=1);

namespace App\FactoryObject\Notifier\Sms;

use App\Interface\Notifier\ReceiverValidatorInterface;

use function preg_match;

class ReceiverValidator implements ReceiverValidatorInterface
{
    public function isValid(string $receiver): bool
    {
        return (bool) preg_match('/^[0-9]{9}+$/', $receiver);
    }
}
