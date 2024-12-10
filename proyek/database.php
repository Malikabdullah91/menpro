<?php
$host = 'localhost';
$db_name = 'keripik_db';
$username = 'root'; // Ganti sesuai dengan username MySQL Anda
$password = ''; // Ganti sesuai password MySQL Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
