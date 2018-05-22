<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController
{
    /**
     * @Route("/",name="homepage")
     *
     * @return Response
     */
    public function homepage()
    {
        return new Response("OMG my first page already!!");
    }

    /**
     * @Route("/exchange",name="exchange")
     */
    public function exchange()
    {
        return new JsonResponse(["OMG my first page already!!"]);
    }
}