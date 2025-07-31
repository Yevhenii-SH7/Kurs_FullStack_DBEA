<?php
function sendEmail($to, $subject, $message, $headers) {
    return mail($to, $subject, $message, $headers);
}

function getTemplateContent($templateFile) {
    return file_get_contents($templateFile);
}

function replacePlaceholders($template, $placeholders) {
    foreach ($placeholders as $key => $value) {
        $template = str_replace("{{{$key}}}", $value, $template);
    }
    return $template;
}

$recipients = [
    ["email" => "empfaenger1@example.com", "name" => "Empfänger 1"],
    ["email" => "empfaenger2@example.com", "name" => "Empfänger 2"],
    // Füge weitere Empfänger hier hinzu
];

$templateFile = 'email_template.html';
$subject = "Betreff der Massen-E-Mail";

$headers = "MIME-Version: 1.0" . "rn";
$headers .= "Content-type:text/html;charset=UTF-8" . "rn";
$headers .= "From: absender@example.com" . "rn";

$templateContent = getTemplateContent($templateFile);

foreach ($recipients as $recipient) {
    $placeholders = [
        'name' => $recipient['name'],
        'subject' => $subject,
    ];

    $message = replacePlaceholders($templateContent, $placeholders);
    if (sendEmail($recipient['email'], $subject, $message, $headers)) {
        echo "E-Mail an {$recipient['name']} ({$recipient['email']}) erfolgreich gesendet.<br>";
    } else {
        echo "E-Mail an {$recipient['name']} ({$recipient['email']}) konnte nicht gesendet werden.<br>";
    }
}
?>