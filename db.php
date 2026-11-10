<?php
// Connect to the Activity 1 database
$conn = new mysqli("localhost", "root", "", "activity1_db");

// Check if the database connection is working
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
