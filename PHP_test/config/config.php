<?php
$cnf_kontakt_path = __DIR__ . "/../fileDB/kontakt.txt";

$dir = dirname($cnf_kontakt_path);
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

if (!file_exists($cnf_kontakt_path)) {
    touch($cnf_kontakt_path);
    chmod($cnf_kontakt_path, 0644);
}
?>