<?php
$host = "localhost";
$username = "root";  // Default XAMPP user
$password = "";      // Default XAMPP password (empty)
$database = "inventory"; // Your database name

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>