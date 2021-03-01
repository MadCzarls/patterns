<?php

declare(strict_types=1);

namespace App\Factory;

use App\Interface\DietInterface;

class MuscleGainTrainingDiet implements DietInterface
{
   public function getCaloriesIntake(): int
    {
        return 3000;
    }
}
