<?php
// Hole Pfad und Methode
$pfad = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$methode = $_SERVER['REQUEST_METHOD'];

// Root path - show HTML page
if ($pfad === '/' || $pfad === '/index.php') {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>PHP Demo</title>
    </head>
    <body>
        <h1>PHP Demo Page</h1>
        <?php
        $number = 10;
        $number2 = 20;
        $sum = $number + $number2;
        echo "<p>Sum: $sum</p>";
        echo "<p>Numbers: $number $number2</p>";
        
        $colors = ["red", 1, "blue"];
        echo "<p>Colors: ";
        print_r($colors);
        echo "</p>";
        ?>
        <h2>API Endpoints:</h2>
        <ul>
            <li><a href="/index.php?route=buecher">GET /index.php?route=buecher</a> - All books</li>
            <li><a href="/index.php?route=buecher&isbn=978-0-452-28423-4">GET /index.php?route=buecher&isbn=978-0-452-28423-4</a> - Get book by ISBN</li>
            <li>POST /index.php?route=buecher - Add book</li>
        </ul>
    </body>
    </html>
    <?php
    exit;
}

// Set JSON header for API routes
header('Content-Type: application/json');

// Debug output
echo "<pre>DEBUG:\n";
echo "Route: " . ($_GET['route'] ?? 'none') . "\n";
echo "ISBN: " . ($_GET['isbn'] ?? 'none') . "\n";
echo "Method: $methode\n";
echo "</pre>";

// Lade Buchdaten aus Datei
$datenPfad = 'buecher.json';
$buecher = json_decode(file_get_contents($datenPfad), true);
echo "<pre>Books loaded: " . (is_array($buecher) ? 'YES' : 'NO') . "</pre>";

// API Routing using query parameters
$route = $_GET['route'] ?? '';

// Debug output
error_log("Route: $route, Method: $methode, ISBN: " . ($_GET['isbn'] ?? 'none'));

if ($methode === 'GET' && $route === 'buecher') {
    if (isset($_GET['isbn'])) {
        $isbn = $_GET['isbn'];
        foreach ($buecher['books'] as $buch) {
            if ($buch['isbn'] === $isbn) {
                echo json_encode($buch, JSON_PRETTY_PRINT);
                exit;
            }
        }
        http_response_code(404);
        echo json_encode(["fehler" => "Buch nicht gefunden"]);
        exit;
    } else {
        echo json_encode($buecher, JSON_PRETTY_PRINT);
        exit;
    }
}

if ($methode === 'POST' && $route === 'buecher') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['title'], $input['author'], $input['year'], $input['isbn'])) {
        http_response_code(400);
        echo json_encode(["fehler" => "Ungültige Eingabe"]);
        exit;
    }

    // Neuen Eintrag hinzufügen
    $buecher['books'][] = $input;
    file_put_contents($datenPfad, json_encode($buecher, JSON_PRETTY_PRINT));

    http_response_code(201);
    echo json_encode(["nachricht" => "Buch hinzugefügt"]);
    exit;
}

http_response_code(404);
echo json_encode(["fehler" => "Route nicht gefunden"]);
?>