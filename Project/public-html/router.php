<?php
// Simple router for PHP built-in server
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route all requests through index.php
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false; // serve the requested resource as-is
} else {
    include_once 'index.php';
}
?>