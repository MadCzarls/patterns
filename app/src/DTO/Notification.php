<?php

declare(strict_types=1);

namespace App\DTO;

class Notification
{
    public ?string $message = null;
    public ?string $receiver = null;
    public bool $isValidReceiver = false;
    public ?string $factoryName = null;

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;
        return $this;
    }

    public function isValidReceiver(): bool
    {
        return $this->isValidReceiver;
    }

    public function setIsValidReceiver(bool $isValidReceiver): self
    {
        $this->isValidReceiver = $isValidReceiver;
        return $this;
    }

    public function getFactoryName(): ?string
    {
        return $this->factoryName;
    }

    public function setFactoryName(string $factoryName): self
    {
        $this->factoryName = $factoryName;
        return $this;
    }
}
