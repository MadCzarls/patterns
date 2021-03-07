<?php

declare(strict_types=1);

namespace App\Interface\Request;

interface HeaderInterface
{
    public function getName(): string;

    public function getValue(): string;
}
