<?php

declare(strict_types=1);

namespace App\Mock;

use JetBrains\PhpStorm\Pure;

/**
 * Session's mock - simulates real data for patterns to use
 */
class Session
{
    #[Pure] public function getLoggedInUser(): User
    {
        return new User();
    }
}