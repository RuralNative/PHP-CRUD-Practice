<?php 
$host = "localhost";
$database = "student_database";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
?>