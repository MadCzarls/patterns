<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

final class FactoryTypeEnum extends Enum
{
    public const MUSCLE_GAIN = 'MuscleGainTrainingFactory';
    public const WEIGHT_LOSS = 'WeightLossTrainingFactory';
}