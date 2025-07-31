<?php
// Настройка получателя и отправителя
$to = "your-email@example.com"; // Замените на ваш email
$subject = "Тестовое письмо";
$message = "Привет! Это тестовое письмо, отправленное с помощью PHP.";

// Дополнительные заголовки
$headers = "From: webmaster@example.com" . "\r\n";
$headers .= "Reply-To: webmaster@example.com" . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

// Отправка письма
if (mail($to, $subject, $message, $headers)) {
    echo "Письмо успешно отправлено!";
} else {
    echo "Ошибка при отправке письма.";
}
?>