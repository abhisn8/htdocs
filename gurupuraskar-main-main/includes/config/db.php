<?php ob_start(); ?>
<?php session_start(); ?>
<?php
$host = "localhost";
$dbname = "gurupuraskar";
$user = "root";
$pass = "";
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>