<?php

$dsn = "mysql:host=localhost;dbname=captcha";
$dbusername = "root";
$dbpassword = "";

// error handling and throwing messages
try {
    $pdo = new PDO ($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed: " .$e->getMessage();
}