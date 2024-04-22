<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

// Instancia Guzzle
$client = new Client();

// URL de la API que queremos consultar
$apiUrl = 'cartero.miguelangel_default';

try {
    $response = $client->get($apiUrl);

    $data = json_decode($response->getBody(), true);
    echo($data);
} catch (Exception $e) {
    // Manejo de errores en caso de que la solicitud falle
    echo 'Error: ' . $e->getMessage();
}
?>