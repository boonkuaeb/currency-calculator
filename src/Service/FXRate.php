<?php
namespace App\Service;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;


class FXRate
{
    private $enPointUrl;
    private $apiKey;

    /**
     * FXRate constructor.
     * @param $enPointUrl
     */
    public function __construct($enPointUrl = "https://forex.1forge.com/1.0.3/convert", $apiKey="EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS")
    {
        $this->enPointUrl = $enPointUrl;
        $this->apiKey=$apiKey;
    }

    public function makeExchange($from_currency, $to_currency, $quantity, LoggerInterface $logger)
    {
        $client = new Client();
        $params = [
            'from' => $from_currency,
            'to' => $to_currency,
            'quantity' => floatval($quantity),
            'api_key' => $this->apiKey
        ];

        $logger->info('params', $params);

        $url_endpoint = $this->enPointUrl . '?' . http_build_query($params);

        $logger->info("api call url", [$url_endpoint]);

        $res = $client->request('GET', $url_endpoint);
        $data = $res->getBody();
        $data_array = json_decode($data, true);
        $logger->info('response from api', $data_array);

        return $data_array;
    }

}