<?php
// db.php
// Database Connection File

$host = "localhost"; // Database Host
$dbname = "library managment"; // Database Name
$username = "root"; // Database Username
$password = ""; // Database Password

// Create Connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set Character Encoding
$conn->set_charset("utf8");
session_start();
?>

