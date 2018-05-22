<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController extends AbstractController
{
    /**
     * @Route("/",name="homepage")
     */
    public function homepage()
    {
        return $this->render("currency/homepage.html.twig",[]);
    }

    /**
     * @Route("/exchange",name="exchange")
     */
    public function exchange()
    {
        return new JsonResponse(["OMG my first page already!!"]);
    }
}