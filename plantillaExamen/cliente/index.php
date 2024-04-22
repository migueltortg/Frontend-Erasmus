<?php
require_once "./vendor/autoload.php";
use GuzzleHttp\Client;
$client = new Client();
$response = $client->request('GET', 'http://correoapi');



echo $response->getBody();