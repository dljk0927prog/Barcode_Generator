<?php
/**
 * Database connection (optional — history feature).
 * Import sql/schema.sql in phpMyAdmin first, then adjust credentials if needed.
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'barcode_generator');
define('DB_USER', 'root');
define('DB_PASS', '');

function db(): ?PDO
{
    static $pdo = null;
    static $tried = false;

    if ($tried) {
        return $pdo;
    }
    $tried = true;

    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    } catch (PDOException $e) {
        $pdo = null;
    }

    return $pdo;
}
