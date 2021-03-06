<?php

declare(strict_types=1);

namespace App\FactoryObject\Notifier\Pager;

use App\Interface\Notifier\ReceiverValidatorInterface;

class ReceiverValidator implements ReceiverValidatorInterface
{
    public function isValid(string $receiver): bool
    {
        //pager identifier can be anything so there's nothing to validate
        return true;
    }
}
