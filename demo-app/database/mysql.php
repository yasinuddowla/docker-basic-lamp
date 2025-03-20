<?php
$host = 'db_service';
$dbname = 'demo_db';
$user = 'user';
$pass = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "Connected to MySQL successfully!<br>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
