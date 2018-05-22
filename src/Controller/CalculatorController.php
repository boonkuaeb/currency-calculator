<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{

    private $BKFxRate;

    /**
     * CalculatorController constructor.
     * @param $BKFxRate
     */
    public function __construct(LoggerInterface $logger)
    {
    }


    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage()
    {
        $data = [
            'api_url'=>'/api/fxrate/exchange'
        ];
        return $this->render("calculator/homepage.html.twig", $data);
    }
}