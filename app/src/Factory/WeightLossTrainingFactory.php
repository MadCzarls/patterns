<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\FactoryTypeEnum;
use App\FactoryObject\WeightLossTrainingCaloriesIntake;
use App\FactoryObject\WeightLossTrainingExerciseSet;
use App\Interface\CaloriesIntakeInterface;
use App\Interface\ExerciseSetInterface;
use App\Mock\Session;
use JetBrains\PhpStorm\Pure;

class WeightLossTrainingFactory extends AbstractTrainingFactory
{
    private Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    #[Pure] public function createExerciseSet(): ExerciseSetInterface
    {
        return new WeightLossTrainingExerciseSet();
    }

    public function createCaloriesIntake(): CaloriesIntakeInterface
    {
        $diet = new WeightLossTrainingCaloriesIntake();
        $diet->setUser($this->session->getLoggedInUser());

        return $diet;
    }

    #[Pure] public function getName(): FactoryTypeEnum
    {
        return new FactoryTypeEnum(FactoryTypeEnum::WEIGHT_LOSS);
    }
}
