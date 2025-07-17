<?php
require_once __DIR__ . '/config/config.php';

if ($_POST['frm_submt'] ?? false) {
    $name = trim($_POST['name'] ?? '');
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    
    if (!empty($name)) {
        
        $file = fopen($cnf_kontakt_path, 'a');
        fwrite($file, $name . PHP_EOL);
        fclose($file);
        

        echo "<!DOCTYPE html>
              <html lang=\"de\">
              <head>
                  <meta charset=\"UTF-8\">
                  <title>Kontakt gespeichert</title>
              </head>
              <body>
                  <h2>Hallo, $name!</h2>
                  <p>Your data has been successfully saved.</p>
                  <p><a href=\"contact.php\">Back to the form</a></p>
              </body>
              </html>";
        exit;
    }
}

// If the form was not submitted, show the form
require __DIR__ . '/contact.php';