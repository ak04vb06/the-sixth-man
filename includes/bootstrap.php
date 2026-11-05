<?php
// Loaded by every page: configuration, session, database connection and helpers.

declare(strict_types=1);

define('ROOT', dirname(__DIR__));

$configFile = ROOT . '/config.php';
if (!is_file($configFile)) {
    $configFile = ROOT . '/config.example.php';
}
$config = require $configFile;

ini_set('display_errors', $config['debug'] ? '1' : '0');
error_reporting(E_ALL);
date_default_timezone_set('Europe/Lisbon');

session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
    $db->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    exit('Não foi possível ligar à base de dados. Verifique o MySQL e o ficheiro config.php '
        . '(ver README).' . ($config['debug'] ? ' ' . htmlspecialchars($e->getMessage()) : ''));
}

require ROOT . '/includes/helpers.php';
require ROOT . '/includes/queries.php';
