<?php

namespace App\Controller;

use App\Service\FXRate;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{

    private $FXRate;

    /**
     * CalculatorController constructor.
     * @param $FXRate
     */
    public function __construct(FXRate $FXRate)
    {
        $this->FXRate = $FXRate;
    }


    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage()
    {
        return $this->render("calculator/homepage.html.twig", []);
    }

    /**
     * @Route("/exchange",name="exchange", methods={"POST"})
     */
    public function exchange(Request $request, LoggerInterface $logger)
    {
        $from_currency = $request->get('from_currency');
        $to_currency = $request->get('to_currency');
        $quantity = $request->get('quantity');
        $data = $this->FXRate->makeExchange($from_currency, $to_currency, $quantity, $logger);
        return new JsonResponse($data);
    }



}