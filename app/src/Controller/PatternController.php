<?php

declare(strict_types=1);

namespace App\Controller;

use App\Builder\Request\CurlBuilder;
use App\Builder\Request\Director;
use App\Builder\Request\WgetBuilder;
use App\DTO\Request as RequestDTO;
use App\Form\RequestType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends AbstractController
{
    #[Route('/pattern/builder', name: 'builder')]
    public function builder(Request $request): Response
    {
//      just example usage demo

        $wgetRequest = null;
        $curlRequest = null;
        $requestHandled = false;
        $errorsWget = [];
        $errorsCurl = [];
        $requestDTO = new RequestDTO();

        $form = $this->createForm(RequestType::class, $requestDTO);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $wgetRequestBuilder = new WgetBuilder();
            $director = new Director();

            $director->setBuilder($wgetRequestBuilder);

            try {
                $director->buildRequestCommand($form->getData());
                $wgetRequest = $wgetRequestBuilder->build();
            } catch (Exception $exception) {
                $errorsWget[] = $exception->getMessage();
            }

            $curlRequestBuilder = new CurlBuilder();

            $director->setBuilder($curlRequestBuilder);

            try {
                $director->buildRequestCommand($form->getData());
                $curlRequest = $curlRequestBuilder->build();
            } catch (Exception $exception) {
                $errorsCurl[] = $exception->getMessage();
            }

            $requestHandled = true;
        }

        return $this->render(
            'pattern/builder.html.twig', [
            'form' => $form->createView(),
            'requestHandled' => $requestHandled,
            'wgetRequest' => $wgetRequest,
            'curlRequest' => $curlRequest,
            'errorsWget' => $errorsWget,
            'errorsCurl' => $errorsCurl,
        ]);
    }
}
