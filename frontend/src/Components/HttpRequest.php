<?php

namespace App\Cinetech\Components;

class HttpRequest
{
  public static function requestGZ($endpoint)
  {
    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', "http://node:8887/{$endpoint}");

    return $response->getBody();
  }
}
