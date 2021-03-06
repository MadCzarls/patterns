<?php

declare(strict_types=1);

namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Notification
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=255)
     */
    public ?string $message = null;
    /** @Assert\NotBlank() */
    public ?string $receiver = null;
    /** @Assert\NotBlank() */
    public ?string $notifier = null;

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

    public function getNotifier(): ?string
    {
        return $this->notifier;
    }

    public function setNotifier(string $notifier): self
    {
        $this->notifier = $notifier;
        return $this;
    }
}
