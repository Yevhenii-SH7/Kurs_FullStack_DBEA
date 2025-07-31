<?php
$lockFile = 'script.lock';

if (file_exists($lockFile)) {
    die('Das Skript wurde bereits ausgeführt.');
}

// Code, der nur einmal ausgeführt werden soll
echo "Das Skript wird zum ersten Mal ausgeführt.\n";

// Erstellen einer Lock-Datei
file_put_contents($lockFile, 'executed');
unlink($lockFile)
?>