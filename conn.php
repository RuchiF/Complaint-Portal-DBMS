<?php
// Database connection details
$servername = "localhost"; // Change to your server host if needed
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "hostel_management3"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>