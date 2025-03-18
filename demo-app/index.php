<?php
$host = 'mysql_host';
$dbname = 'demo_db';
$user = 'user';
$pass = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "Connected to MySQL successfully!<br>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

# create a table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE
)";
$pdo->exec($sql);
echo "Table users created successfully!<br><br>";

# insert a record
$randomValue = rand(1, 1000);
$sql = "INSERT INTO users (name, email) VALUES ('John Doe', '{$randomValue}john@rms2.com')";
$pdo->exec($sql);
echo "Record inserted successfully!";

# select records
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<br><br>Users:<br>";
foreach ($users as $user) {
    echo "ID: " . $user['id'] . " - Name: " . $user['name'] . " - Email: " . $user['email'] . "<br>";
}
