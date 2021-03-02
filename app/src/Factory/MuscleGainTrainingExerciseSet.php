<?php

declare(strict_types=1);

namespace App\Factory;

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
