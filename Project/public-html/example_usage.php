<?php
require_once 'guest_db.php';

try {
    $mysqli = getDbConnection();
    
    // Обработка формы
    if (isset($_POST['name']) && isset($_POST['nachricht'])) {
        $stmt = $mysqli->prepare("INSERT INTO guestbook (name, nachricht) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['name'], $_POST['nachricht']);
        $stmt->execute();
        echo "Eintrag hinzugefügt!<br>";
    }
    
    // Вывод данных из таблицы guestbook
    $result = $mysqli->query("SELECT * FROM guestbook");
    
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $column => $value) {
            echo "$column: $value | ";
        }
        echo "<br>";
    }
    
    $mysqli->close();
    
} catch (Exception $e) {
    echo "Fehler: " . $e->getMessage();
}
?>

<form method="post">
<input type="text" name="name" placeholder="Name" required>
<input type="text" name="nachricht" placeholder="Nachricht" required>
<input type="submit" value="Submit">
</form>
