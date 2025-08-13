<?php

function sendJsonResponse($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

function generateRandomFlight($start, $destination, $date) {
    $times = ['08:30', '10:15', '12:45', '14:20', '16:10', '18:35', '20:00'];
    $durations = ['1h 15m', '1h 45m', '2h 10m', '2h 30m', '3h 05m'];
    $terminals = ['T1', 'T2', 'T3'];
    
    $startTime = $times[array_rand($times)];
    $duration = $durations[array_rand($durations)];
    $businessPrice = rand(250, 500);
    $economyPrice = rand(100, 200);
    
    return [
        'start' => $start,
        'destination' => $destination,
        'date' => $date,
        'stops' => rand(0, 2),
        'startZeit' => $startTime,
        'endZeit' => date('H:i', strtotime($startTime) + rand(3600, 10800)),
        'flugdauer' => $duration,
        'preis' => [
            'business' => $businessPrice . ' EUR',
            'economy' => $economyPrice . ' EUR'
        ],
        'terminal' => $terminals[array_rand($terminals)]
    ];
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    sendJsonResponse(null, 200);
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    sendJsonResponse(['Fehler' => 'Nur GET-Anfragen erlaubt.'], 405);
}

$start = $_GET['start'] ?? '';
$destination = $_GET['destination'] ?? '';
$date = $_GET['date'] ?? '';

if (!$start || !preg_match('/^[\p{L}\p{N}\s\-\.]{1,50}$/u', $start)) {
    sendJsonResponse(['error' => 'Invalid parameters'], 400);
}

if (!$destination || !preg_match('/^[\p{L}\p{N}\s\-\.]{1,50}$/u', $destination)) {
    sendJsonResponse(['error' => 'Invalid parameters'], 400);
}

if (!$date || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    sendJsonResponse(['error' => 'Invalid parameters'], 400);
}

$start = htmlspecialchars($start, ENT_QUOTES, 'UTF-8');
$destination = htmlspecialchars($destination, ENT_QUOTES, 'UTF-8');
$date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');

$travel_data = [];
for ($i = 0; $i < rand(2, 5); $i++) {
    $travel_data[] = generateRandomFlight($start, $destination, $date);
}

sendJsonResponse($travel_data);
?>