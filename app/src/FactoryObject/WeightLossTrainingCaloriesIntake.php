<?php

declare(strict_types=1);

namespace App\FactoryObject;

use App\Enum\CaloriesIntakeEnum;
use App\Enum\UserGenderEnum;
use App\Interface\CaloriesIntakeInterface;
use App\Mock\User;

class WeightLossTrainingCaloriesIntake implements CaloriesIntakeInterface
{
    private ?User $user = null;

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    private function getUser(): ?User
    {
        return $this->user;
    }

    public function getValue(): CaloriesIntakeEnum
    {
        $caloriesIntake = new CaloriesIntakeEnum(CaloriesIntakeEnum::WEIGHT_LOSS_DEFAULT_CALORIES_INTAKE);

        if ($this->getUser()) {
            $caloriesIntake = match ($this->getUser()->getGender()->getValue()) {
                UserGenderEnum::FEMALE => new CaloriesIntakeEnum(CaloriesIntakeEnum::WEIGHT_LOSS_FEMALE_CALORIES_INTAKE),
                UserGenderEnum::MALE => new CaloriesIntakeEnum(CaloriesIntakeEnum::WEIGHT_LOSS_MALE_CALORIES_INTAKE),
                default => $caloriesIntake
            };
        }

        return $caloriesIntake;
    }
}
