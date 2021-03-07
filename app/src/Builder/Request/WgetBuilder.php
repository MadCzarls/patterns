<?php

declare(strict_types=1);

namespace App\Builder\Request;

use App\Builder\Request\Product\Request;
use App\Interface\Request\RequestInterface;

class WgetBuilder extends AbstractRequestBuilder
{
    public function build(): RequestInterface
    {
//        @TODO unittest
        $this->validate();

        $command = 'wget ';
        $command .= sprintf(' --method %s', $this->getHttpMethod());
        $command .= sprintf(' %s ', $this->getUrl());

        foreach ($this->getHeaders() as $header) {
            $command .= sprintf(" --header '%s: %s'", $header->getName(), $header->getValue());
        }

        if (!empty($this->getBody())) {
            $command .= sprintf(" --post-data '%s'", $this->getBody());
        }

        return new Request($command);
    }

}
