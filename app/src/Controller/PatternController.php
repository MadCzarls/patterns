<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\TrainingFactoryLocator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends AbstractController
{
    #[Route('/pattern/abstract-factory', name: 'abstractFactory')]
    public function abstractFactory(): Response
    {
        return $this->render(
            'pattern/abstractFactory.html.twig'
        );
    }

    #[Route('/pattern/abstract-factory/{factoryName}', name: 'abstractFactoryType')]
    public function abstractFactoryType(
        string $factoryName,
        TrainingFactoryLocator $trainingFactoryLocator
    ): Response
    {
        $factory = $trainingFactoryLocator->locate($factoryName);

        $caloriesIntake = $factory->createCaloriesIntake();
        $exerciseSet = $factory->createExerciseSet();

        return $this->render(
            'pattern/abstractFactoryTraining.html.twig', [
             'factory'        => $factory,
             'caloriesIntake' => $caloriesIntake,
             'exerciseSet'    => $exerciseSet,
            ]
        );
    }
}
