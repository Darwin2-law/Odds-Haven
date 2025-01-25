<?php
$host = 'localhost'; // Database host
$dbname = 'admin_panel'; // Database name
$username = 'root'; // MySQL username
$password = ''; // MySQL password

try {
    // Create a PDO instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
