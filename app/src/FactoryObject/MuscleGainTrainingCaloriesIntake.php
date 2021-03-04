<?php

declare(strict_types=1);

namespace App\FactoryObject;

use App\Enum\CaloriesIntakeEnum;
use App\Interface\CaloriesIntakeInterface;
use JetBrains\PhpStorm\Pure;

class MuscleGainTrainingCaloriesIntake implements CaloriesIntakeInterface
{
   #[Pure] public function getValue(): CaloriesIntakeEnum
   {
        return new CaloriesIntakeEnum(CaloriesIntakeEnum::MUSCLE_GAIN_INTAKE);
   }
}
