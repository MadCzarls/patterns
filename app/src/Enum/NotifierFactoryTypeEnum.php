<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

final class NotifierFactoryTypeEnum extends Enum
{
    public const MORSE_CODE = 'MorseCode';
    public const SMS = 'Sms';
    public const PAGER = 'Pager';
}
