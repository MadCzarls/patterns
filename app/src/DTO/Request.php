<?php

declare(strict_types=1);

namespace App\DTO;

use App\Enum\RequestHttpMethodEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JetBrains\PhpStorm\Pure;

class Request
{
    public ?string $url = null;
    public ?string $method = null;
    public ?string $body = null;
    public Collection $headers;

    #[Pure] public function __construct()
    {
        $this->headers = new ArrayCollection();
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function addHeader(Header $header): void
    {
        $this->headers->add($header);
    }

    public function removeHeader(Header $header): void
    {
        $this->headers->remove($header);
    }

    public function getHeaders(): Collection
    {
        return $this->headers;
    }
}
