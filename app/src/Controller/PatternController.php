<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\UnsupportedFactoryTypeException;
use App\Factory\MuscleGainTrainingFactory;
use App\Factory\WeightLossTrainingFactory;
use App\Interface\FactoryTypeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends AbstractController
{
    #[Route('/pattern/abstract-factory/{type}', name: 'abstractFactory')]
    public function index(int $type): Response
    {
        $factory = match ($type) {
            FactoryTypeInterface::FACTORY_TRAINING_MUSCLE_GAIN => new MuscleGainTrainingFactory(),
            FactoryTypeInterface::FACTORY_TRAINING_WEIGHT_LOSS => new WeightLossTrainingFactory(),
            default => throw new UnsupportedFactoryTypeException(sprintf('Unsupported abstract factory type: "%s"', $type)),
        };

       $diet = $factory->createDiet();
       $exerciseSet = $factory->createExerciseSet();

        return $this->render(
            'pattern/abstractFactory.html.twig',
            [
             'factory'     => $factory,
             'diet'        => $diet,
             'exerciseSet' => $exerciseSet,
            ]
        );
    }
}
