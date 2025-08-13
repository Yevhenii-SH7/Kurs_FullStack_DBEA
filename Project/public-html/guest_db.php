<?php
function getDbConnection() {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // Для Docker-среды используем имя контейнера вместо localhost
    $mysqli = new mysqli('mysql-container', 'gb_user', 'gb_user', 'guest_db');
    
    if ($mysqli->connect_errno) {
        throw new RuntimeException('Ошибка подключения к базе данных: ' . $mysqli->connect_error);
    }
    
    // Устанавливаем кодировку UTF-8
    $mysqli->set_charset('utf8mb4');
    
    return $mysqli;
}

// Если файл запущен напрямую, показать статус подключения
if (basename(__FILE__) == basename($_SERVER['SCRIPT_NAME'])) {
    try {
        $mysqli = getDbConnection();
        echo "✅ Успешное подключение к базе данных!";
        $mysqli->close();
    } catch (Exception $e) {
        echo "❌ Ошибка: " . $e->getMessage();
    }
}
?>