<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

final class CaloriesIntakeEnum extends Enum
{
    public const WEIGHT_LOSS_DEFAULT_CALORIES_INTAKE = 1500;
    public const WEIGHT_LOSS_MALE_CALORIES_INTAKE = 1600;
    public const WEIGHT_LOSS_FEMALE_CALORIES_INTAKE = 1400;

    public const MUSCLE_GAIN_INTAKE = 3000;
}