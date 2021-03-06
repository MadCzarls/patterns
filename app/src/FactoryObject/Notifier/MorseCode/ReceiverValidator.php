<?php

declare(strict_types=1);

namespace App\FactoryObject\Notifier\MorseCode;

use App\Interface\Notifier\ReceiverValidatorInterface;

use const FILTER_VALIDATE_EMAIL;

use function filter_var;

class ReceiverValidator implements ReceiverValidatorInterface
{
    public function isValid(string $receiver): bool
    {
        if (filter_var($receiver, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }
}
