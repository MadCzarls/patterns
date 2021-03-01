<?php

declare(strict_types=1);

namespace App\Interface;

interface ExerciseSetInterface
{
    /**
     * @return string[]
     */
    public function getExercises(): array;
}
