<?php
namespace App\Repository;

use Symfony\Component\Dotenv\Dotenv;
use GuzzleHttp\Client;

abstract class AbstractRepository
{
    protected function getUri()
    {
        return 'https://api.themoviedb.org/3/';
    }

    protected function apiKey()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . "/../../.env");

        return 'api_key=' . $_ENV['api_key'];
    }

    protected function getResponse(string $url)
    {
        $client = new Client();
        $response = $client->get($url)->getBody();
        return json_decode($response, true);
    }
}

