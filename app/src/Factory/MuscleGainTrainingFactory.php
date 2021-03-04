<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\FactoryTypeEnum;
use App\FactoryObject\MuscleGainTrainingCaloriesIntake;
use App\FactoryObject\MuscleGainTrainingExerciseSet;
use App\Interface\CaloriesIntakeInterface;
use App\Interface\ExerciseSetInterface;
use JetBrains\PhpStorm\Pure;

class MuscleGainTrainingFactory extends AbstractTrainingFactory
{
    #[Pure] public function createExerciseSet(): ExerciseSetInterface
    {
        return new MuscleGainTrainingExerciseSet();
    }

    #[Pure] public function createCaloriesIntake(): CaloriesIntakeInterface
    {
        return new MuscleGainTrainingCaloriesIntake();
    }

    #[Pure] public function getName(): FactoryTypeEnum
    {
        return new FactoryTypeEnum(FactoryTypeEnum::MUSCLE_GAIN);
    }
}
