<?php
$host = getenv('PGHOST');
$db   = getenv('PGDATABASE');
$user = getenv('PGUSER');
$pass = getenv('PGPASSWORD');
$port = getenv('PGPORT');

$pdo = new PDO(
    "pgsql:host=$host;dbname=$db;port=$port",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
?>
