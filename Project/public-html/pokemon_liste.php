<?php
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client(['base_uri' => 'https://pokeapi.co/api/v2/']);

try {
    $data = json_decode($client->get('pokemon?limit=50')->getBody(), true);
    
    echo "Alle Pokémon:\n";
    foreach ($data['results'] as $pokemon) {
        $id = basename($pokemon['url']);
        $details = json_decode($client->get("pokemon/$id")->getBody(), true);
        
        echo "- ID: $id - " . ucfirst($pokemon['name']) . "\n";
        echo "  Typ(en): " . implode(', ', array_column($details['types'], 'name', 'type')) . "\n";
        echo "  Gewicht: " . ($details['weight'] / 10) . " kg\n";
        echo "  Größe: " . ($details['height'] / 10) . " m\n";
        echo "  Fähigkeiten: " . implode(', ', array_column($details['abilities'], 'name', 'ability')) . "\n\n";
    }
} catch (Exception $e) {
    echo "Fehler: " . $e->getMessage();
}