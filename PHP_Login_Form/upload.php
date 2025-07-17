<?php
session_start();

if (!($_SESSION['login'] ?? false)) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: userpanel.php');
    exit();
}

if (!isset($_FILES['fileToUpload']) || $_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
    echo "Fehler: Keine Datei hochgeladen oder Upload-Fehler.<br><a href='userpanel.php'>Zurück</a>";
    exit();
}

$uploadDir = 'uploads/';
!is_dir($uploadDir) && mkdir($uploadDir, 0755);

$uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
    echo "The file " . htmlspecialchars(basename($_FILES['fileToUpload']['name'])) . " wurde hochgeladen.";
    echo "<br><a href='userpanel.php'>Zurück zum Benutzerpanel</a>";
} else {
    echo "Beim Hochladen Ihrer Datei ist leider ein Fehler aufgetreten.";
    echo "<br><a href='userpanel.php'>Zurück zum Benutzerpanel</a>";
}
?>