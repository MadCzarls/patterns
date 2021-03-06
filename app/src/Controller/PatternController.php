<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Model\Notification as NotificationFormModel;
use App\Form\NotificationType;
use App\Service\Notifier\NotificationHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends AbstractController
{
    #[Route('/pattern/abstract-factory', name: 'abstractFactory')]
    public function abstractFactory(Request $request, NotificationHandler $notificationHandler): Response
    {
        $notificationDTO = [];
        $requestHandled = false;
        $notificationFormModel = new NotificationFormModel();

        $form = $this->createForm(NotificationType::class, $notificationFormModel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $notificationDTO = $notificationHandler->handle($form->getData());
            $requestHandled = true;
        }

        return $this->render(
            'pattern/abstractFactory.html.twig', [
            'form' => $form->createView(),
            'requestHandled' => $requestHandled,
            'notificationDTO' => $notificationDTO,
        ]);
    }
}
