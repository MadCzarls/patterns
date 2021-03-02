<?php

declare(strict_types=1);

namespace App\Factory;

use App\Interface\DietInterface;
use App\Interface\ExerciseSetInterface;
use JetBrains\PhpStorm\Pure;

class WeightLossTrainingFactory extends AbstractTrainingFactory
{
    #[Pure] public function createExerciseSet(): ExerciseSetInterface
    {
        return new WeightLossTrainingExerciseSet();
    }

    #[Pure] public function createDiet(): DietInterface
    {
        return new WeightLossTrainingDiet();
    }

    public function getName(): string
    {
        return 'WeightLossTrainingFactory';
    }
}
