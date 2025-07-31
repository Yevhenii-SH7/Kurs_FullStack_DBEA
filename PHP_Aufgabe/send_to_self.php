<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
   
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'my-gmail@gmail.com';
    $mail->Password   = 'my-app-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // Absender und Empfänger - dieselbe Adresse
    $mail->setFrom('my-gmail@gmail.com', 'Dein Name');
    $mail->addAddress('my-gmail@gmail.com');

    // E-Mail-Inhalt
    $mail->isHTML(true);
    $mail->Subject = 'Test-E-Mail an mich selbst';
    $mail->Body    = '<p>Dies ist eine Test-E-Mail.</p>';

    $mail->send();
    echo 'E-Mail wurde erfolgreich gesendet!';
} catch (Exception $e) {
    echo "Fehler: {$mail->ErrorInfo}";
}
?>