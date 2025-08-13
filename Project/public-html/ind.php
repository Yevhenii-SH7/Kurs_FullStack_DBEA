<?php
header('Content-Type: application/json');

// Lade Buchdaten aus Datei
$datenPfad = 'buecher.json';
$data = json_decode(file_get_contents($datenPfad), true);
$buecher = isset($data['books']) ? $data['books'] : $data;

// Hole Pfad und Methode
$pfad = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$methode = $_SERVER['REQUEST_METHOD'];

// Fallback für direkte PHP-Aufrufe
if (isset($_GET['route'])) {
    $pfad = '/' . $_GET['route'];
}

// Routing
if ($methode === 'GET' && ($pfad === '/' || $pfad === '/ind.php')) {
    echo json_encode(["nachricht" => "API bereit", "verfuegbare_routen" => ["/buecher", "/buecher/{isbn}"]]);
    exit;
}

if ($methode === 'GET' && $pfad === '/buecher') {
    echo json_encode($buecher, JSON_PRETTY_PRINT);
    exit;
}

if ($methode === 'GET' && preg_match('#^/buecher/([^/]+)$#', $pfad, $matches)) {
    $isbn = $matches[1];
    foreach ($buecher as $buch) {
        if (isset($buch['isbn']) && $buch['isbn'] === $isbn) {
            echo json_encode($buch, JSON_PRETTY_PRINT);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(["fehler" => "Buch nicht gefunden"]);
    exit;
}

if ($methode === 'POST' && $pfad === '/buecher') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['title'], $input['author'], $input['year'], $input['isbn'])) {
        http_response_code(400);
        echo json_encode(["fehler" => "Ungültige Eingabe"]);
        exit;
    }

    // Neuen Eintrag hinzufügen
    $buecher[] = $input;
    $data['books'] = $buecher;
    file_put_contents($datenPfad, json_encode($data, JSON_PRETTY_PRINT));

    http_response_code(201);
    echo json_encode(["nachricht" => "Buch hinzugefügt"]);
    exit;
}

http_response_code(404);
echo json_encode(["fehler" => "Route nicht gefunden"]);