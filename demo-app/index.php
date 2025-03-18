<?php
include 'database/helper.php';

$dbType = 'sqlite';

if ($dbType == 'mysql') {
    include 'database/mysql.php';
} elseif ($dbType == 'sqlite') {
    include 'database/sqlite.php';
}
echo "DB Type: {$dbType}<br>";
# create a table
$sql = getCreateUserSQL($dbType);

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
