<?php
$host = 'localhost';
$db = 'bini_info';
$user = 'root';
$pass = '';

// Create connection using MySQLi
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
