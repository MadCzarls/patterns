<?php

declare(strict_types=1);

namespace App\Builder\Request\Product;

use App\Interface\Request\RequestInterface;

class Request implements RequestInterface
{
    private string $command;

    public function __construct(string $command)
    {
        $this->command = $command;
    }

    public function getCommand(): string
    {
        return $this->command;
    }
}
