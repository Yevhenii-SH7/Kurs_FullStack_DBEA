<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

try {
    $client = new Client();
    $response = $client->request('GET', 'https://api.kurs.dbe.academy/');
    
    echo "<h3>Antwortet von API:</h3>";
    echo "<pre>" . htmlspecialchars($response->getBody()->getContents()) . "</pre>";
} catch (RequestException $e) {
    echo "Fehler beim Senden: " . $e->getMessage();
}

phpinfo()
?>