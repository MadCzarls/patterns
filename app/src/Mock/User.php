<?php

declare(strict_types=1);

namespace App\Mock;

use App\Enum\UserGenderEnum;

/**
 * User's mock - simulates real data for patterns to use
 */
class User
{
    public function getGender(): UserGenderEnum
    {
        $genders = [
            UserGenderEnum::MALE,
            UserGenderEnum::FEMALE,
        ];

        return UserGenderEnum::from($genders[array_rand($genders)]);
    }
}
