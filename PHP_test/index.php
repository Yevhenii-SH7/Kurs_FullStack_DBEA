<?php
/*
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
    echo "Username: " . ($_POST["username"] ?? "не указано") . "<br>";
    echo "Email: " . ($_POST["email"] ?? "не указано") . "<br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form POST</title>
</head>
<body>
    <form action="action.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <input type="submit" value="Отправить" name="submit">
        </div>
    </form>
</body>
</html>
*/
?>













<?php
/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    setcookie("name", $username, time() + 3600);
    $_COOKIE["name"] = $username;
    echo "POST";
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}
$name = $_COOKIE["name"] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($name): ?>
        <h1> Hallo <?php echo $name; ?></h1>
    <?php else: ?>
    <form action="action.php" method="post">
        <label for="username">Username: <input type="text" name="username" id="username"></label>
        <button type="submit">Submit</button>
    </form>
    <?php endif; ?>
</body>
</html>


<?php
/*  
<!DOCTYPE html>
<html>
<head>
<title>Упражнение с куки-файлами</title>
</head>
<body>
<?php
// Проверяем, была ли отправлена форма
if(isset($_POST["submit"])){
$username = $_POST["username"];

// Устанавливаем куки-файл с именем пользователя
setcookie("username", $username, time() + (86400 * 30), "/"); // Действителен в течение 30 дней

// Перенаправляем на обновленную страницу
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
}

// Проверяем, существует ли куки-файл
if(isset($_COOKIE["username"])){
$storedName = $_COOKIE["username"];
echo "<h2>С возвращением, $storedName!</h2>";
}
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<label for="username">Ваше имя:</label>
<input type="text" name="username" id="username" required>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
*/
?>