<?php

namespace App\Controller;


use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
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

        $data = $this->makeExchange($from_currency, $to_currency, $quantity, $logger);
        return new JsonResponse($data);
    }

    private function makeExchange($from_currency, $to_currency, $quantity, LoggerInterface $logger)
    {
        $client = new Client();
        $params = [
            'from' => $from_currency,
            'to' => $to_currency,
            'quantity' => floatval($quantity),
            'api_key' => 'EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS'
        ];

        $logger->info('params', $params);

        $endpoint = 'https://forex.1forge.com/1.0.3/convert';
        $url_endpoint = $endpoint . '?' . http_build_query($params);

        $logger->info("api call url", [$url_endpoint]);

        $res = $client->request('GET', $url_endpoint);
        $data = $res->getBody();
        $data_array = json_decode($data, true);

        $logger->info('response from api', $data_array);


        return $data_array;
    }

}