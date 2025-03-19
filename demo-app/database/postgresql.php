<?php
$dsn = "pgsql:host=postgres;port=5432;dbname=mydatabase;";
$user = "myuser";
$password = "mypassword";

try {
    $pdo = new PDO($dsn, $user, $password);
    echo "Connected to PostgreSQL successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
