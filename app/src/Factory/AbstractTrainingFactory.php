<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\FactoryTypeEnum;
use App\Interface\CaloriesIntakeInterface;
use App\Interface\ExerciseSetInterface;

abstract class AbstractTrainingFactory
{
    abstract public function getName(): FactoryTypeEnum;

    abstract public function createExerciseSet(): ExerciseSetInterface;

    abstract public function createCaloriesIntake(): CaloriesIntakeInterface;
}
