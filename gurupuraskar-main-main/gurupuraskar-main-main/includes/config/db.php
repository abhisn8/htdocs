<?php ob_start(); ?>
<?php session_start(); ?>
<?php
$host = "localhost";
$dbname = "u857015662_gurupuraskar";
$user = "u857015662_gurupuraskar";
$pass = "Gurupuraskar999";
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>