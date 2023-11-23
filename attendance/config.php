<?php

$dbHost = 'localhost';
$dbName = 'attendees';
$dbUser = 'root';
$dbPassword = '';
try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
$db->exec("SET time_zone = '+08:00'");

