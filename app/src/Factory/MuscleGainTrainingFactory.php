<?php

declare(strict_types=1);

namespace App\Factory;

use App\Interface\DietInterface;
use App\Interface\ExerciseSetInterface;
use JetBrains\PhpStorm\Pure;

class MuscleGainTrainingFactory extends AbstractTrainingFactory
{
    #[Pure] public function createExerciseSet(): ExerciseSetInterface
    {
        return new MuscleGainTrainingExerciseSet();
    }

    #[Pure] public function createDiet(): DietInterface
    {
        return new MuscleGainTrainingDiet();
    }

    public function getName(): string
    {
        return 'MuscleGainTrainingFactory';
    }
}
