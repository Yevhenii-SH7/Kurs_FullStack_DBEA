<?php
header('Content-Type: application/json');

function generateRandomFlight($start, $ziel) {
    $stops = rand(0, 2);
    $startZeit = date('H:i', strtotime('+'.rand(0, 23).' hours +'.rand(0, 59).' minutes'));
    $endZeit = date('H:i', strtotime($startZeit) + rand(1, 5) * 3600 + rand(0, 59) * 60);
    $flugdauer = rand(1, 5) . 'h ' . rand(0, 59) . 'm';
    $preisBusiness = rand(300, 500) . ' EUR';
    $preisEconomy = rand(100, 200) . ' EUR';
    $terminal = 'T' . rand(1, 3);

    return array(
        'start' => $start,
        'ziel' => $ziel,
        'stops' => $stops,
        'startZeit' => $startZeit,
        'endZeit' => $endZeit,
        'flugdauer' => $flugdauer,
        'preis' => array(
            'business' => $preisBusiness,
            'economy' => $preisEconomy
        ),
        'terminal' => $terminal
    );
}

if (isset($_GET['start']) && isset($_GET['ziel']) && isset($_GET['datum'])) {
    $start = htmlspecialchars($_GET['start']);
    $ziel = htmlspecialchars($_GET['ziel']);
    $datum = htmlspecialchars($_GET['datum']);

    // Hier können Sie zusätzliche Validierungen für die Parameter hinzufügen

    // Generiere eine zufällige Anzahl von Flügen (z.B. zwischen 1 und 5)
    $anzahlFluege = rand(1, 5);
    $fluege = array();

    for ($i = 0; $i < $anzahlFluege; $i++) {
        $fluege[] = generateRandomFlight($start, $ziel);
    }

    echo json_encode($fluege);
} else {
    echo json_encode(array('Fehler' => 'Ein oder mehrere Parameter fehlen: start, ziel, datum'));
}
?>