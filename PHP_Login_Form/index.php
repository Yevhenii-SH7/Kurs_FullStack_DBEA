<?php
session_start();

if ($_SESSION['login'] ?? false) {
    header('Location: userpanel.php');
    exit();
}

$admin_name = "admin";
$admin_password = "admin";

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($username !== null && $password !== null) {
    if ($username == $admin_name && $password == $admin_password) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header('Location: userpanel.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Login fehlgeschlagen";
        header('Location: index.php');
        exit();
    }
}

$error_message = $_SESSION['error_message'] ?? null;
unset($_SESSION['error_message']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Willkommen zum Site</h1>
    <h2>Bitte loggen Sie</h2>
    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <form action="index.php" method="post">
        <div style="margin-bottom: 10px;">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" style="margin: 10px 170px;">Login</button> 
    </form>
</body>
</html>