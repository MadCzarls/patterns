<?php

declare(strict_types=1);

namespace App\Builder\Request;

use App\Builder\Request\Product\Request;
use App\Interface\Request\RequestInterface;

use function sprintf;

class CurlBuilder extends AbstractRequestBuilder
{
    public function build(): RequestInterface
    {
        $this->validate();

        $command = 'curl';
        $command .= sprintf(' -X %s', $this->getHttpMethod());
        $command .= sprintf(' %s', $this->getUrl());

        foreach ($this->getHeaders() as $header) {
            $command .= sprintf(" -H '%s: %s'", $header->getName(), $header->getValue());
        }

        if (!empty($this->getBody())) {
            $command .= sprintf(" -d '%s'", $this->getBody());
        }

        return new Request($command);
    }
}
