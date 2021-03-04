<?php

declare(strict_types=1);

namespace App\FactoryObject;

use App\Interface\ExerciseSetInterface;

class MuscleGainTrainingExerciseSet implements ExerciseSetInterface
{
    public function getExercises(): array
    {
        return [
            'squats',
            'pushups',
        ];
    }
}
