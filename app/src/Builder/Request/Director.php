<?php

declare(strict_types=1);

namespace App\Builder\Request;

use App\DTO\Header;
use App\DTO\Request;
use App\Enum\RequestHttpMethodEnum;
use App\Exception\RequestDirectorException;
use App\Interface\Request\RequestBuilderInterface;

class Director
{
    private ?RequestBuilderInterface $builder = null;

    public function setBuilder(RequestBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function buildRequestCommand(Request $request)
    {
        if (empty($this->builder)) {
            throw new RequestDirectorException('Builder is not set!');
        }

        $this->builder
            ->setHttpMethod(RequestHttpMethodEnum::from($request->getMethod()))
            ->setBody($request->getBody())
            ->setUrl($request->getUrl());

        foreach ($request->getHeaders() as $header) {
            /** @var Header $header */
            $this->builder->addHeader($header->getName(), $header->getValue());
        }
    }
}
