<?php

declare(strict_types=1);

namespace App\Interface\Request;

use App\Enum\RequestHttpMethodEnum;

interface RequestBuilderInterface
{
    public function addHeader(string $name, string $value): self;

    public function setHttpMethod(RequestHttpMethodEnum $method): self;

    public function setUrl(string $url): self;

    public function setBody(?string $body): self;

    public function build(): RequestInterface;
}
