<?php
$host = "localhost";
$username = "root";  // Default XAMPP user
$pass = "";      // Default XAMPP password (empty)
$database = "inventory"; // Your database name

$conn = new mysqli($host, $username, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed at trying to connect: " . $conn->connect_error);
} else {
    //echo "Connected successfully!";
}
?>