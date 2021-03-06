<?php

declare(strict_types=1);

namespace App\Service\Notifier;

use App\DTO\Notification;
use App\Exception\UnsupportedFactoryTypeException;
use App\Form\Model\Notification as NotificationForm;

class NotificationHandler
{
    private FactoryLocator $locator;

    public function __construct(FactoryLocator $locator)
    {
        $this->locator = $locator;
    }

    public function handle(NotificationForm $notification): Notification
    {
        $result = new Notification();

        try {
            $factory = $this->locator->locate($notification->getNotifier());
        } catch (UnsupportedFactoryTypeException) {
//            @TODO log
            return $result;
        }

        $result
            ->setFactoryName((string) $factory->getName())
            ->setReceiver($notification->getReceiver())
            ->setIsValidReceiver($factory->getReceiverValidator()->isValid($notification->getReceiver()))
            ->setMessage($factory->getMessageHandler()->prepare($notification->getMessage()));

        return $result;
    }
}
