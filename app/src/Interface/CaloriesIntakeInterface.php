<?php

declare(strict_types=1);

namespace App\Interface;

use App\Enum\CaloriesIntakeEnum;

interface CaloriesIntakeInterface
{
    public function getValue(): CaloriesIntakeEnum;
}
