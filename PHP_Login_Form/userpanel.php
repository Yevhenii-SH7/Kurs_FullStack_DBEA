<?php
session_start();

if (!($_SESSION['login'] ?? false)) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
</head>
<body>
    <h1>Willkommen <?= htmlspecialchars($_SESSION['username'] === "admin" ? "Admin" : 'User') ?> to User Panel</h1>
    <p>Sie sind erfolgreich eingeloggt!</p>
    <a href="logout.php">Logout</a>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>