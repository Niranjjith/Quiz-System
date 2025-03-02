<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}

$host = "localhost"; // Change if needed
$user = "root"; // Default XAMPP username
$pass = ""; // Default XAMPP password (leave empty)
$dbname = "quiz_database"; // Ensure this matches the actual database name


// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
