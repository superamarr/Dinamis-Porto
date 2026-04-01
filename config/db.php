<?php

function loadEnv(string $path): void
{
    if (!is_file($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) return;

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) continue;
        if (!str_contains($line, '=')) continue;

        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if ((str_starts_with($value, '"') && str_ends_with($value, '"')) || (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
            $value = substr($value, 1, -1);
        }

        if ($key !== '') {
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

$envPath = __DIR__ . '/../.env';
loadEnv($envPath);

$dbHost = $_ENV['DB_HOST'] ?? $_SERVER['DB_HOST'] ?? 'localhost';
$dbName = $_ENV['DB_NAME'] ?? $_SERVER['DB_NAME'] ?? '';
$dbUser = $_ENV['DB_USER'] ?? $_SERVER['DB_USER'] ?? '';
$dbPass = $_ENV['DB_PASSWORD'] ?? $_SERVER['DB_PASSWORD'] ?? '';

if ($dbName === '') {

    throw new RuntimeException('DB_NAME is missing in .env');
}

$dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
$pdo = new PDO($dsn, $dbUser, $dbPass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

return $pdo;

