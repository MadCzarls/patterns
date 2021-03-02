<?php

declare(strict_types=1);

namespace App\Factory;

use App\Interface\DietInterface;
use App\Interface\ExerciseSetInterface;

abstract class AbstractTrainingFactory
{
    abstract public function getName(): string;

    abstract public function createExerciseSet(): ExerciseSetInterface;

    abstract public function createDiet(): DietInterface;
}
