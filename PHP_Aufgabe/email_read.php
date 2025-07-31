<?php
function readEmailAddresses($filePath) {
    // Datei lesen und Zeilen in ein Array laden
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return $lines;
}

$emailFilePath = 'emails.txt';
$emails = readEmailAddresses($emailFilePath);

// Testausgabe der gelesenen E-Mail-Adressen
foreach ($emails as $email) {
    echo $email . "<br>";
}
?>


<?php
/*
function readEmailAddresses($filePath) {
    $emailAddresses = [];
    
    // Datei öffnen
    $file = fopen($filePath, "r");
    if ($file) {
        // Jede Zeile der Datei lesen
        while (($line = fgets($file)) !== false) {
            // Leerzeichen und Zeilenumbrüche entfernen
            $line = trim($line);
            // Nur nicht-leere Zeilen verarbeiten
            if (!empty($line)) {
                $emailAddresses[] = $line;
            }
        }
        fclose($file);
    } else {
        echo "Konnte die Datei nicht öffnen: $filePath";
    }
    
    return $emailAddresses;
}

$emailFilePath = 'emails.txt';
$emails = readEmailAddresses($emailFilePath);

// Testausgabe der gelesenen E-Mail-Adressen
foreach ($emails as $email) {
    echo $email . "<br>";
}
*/
?>
