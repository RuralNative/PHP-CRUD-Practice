<?php
// Include the database connection file and the Employee class
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form input values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $class_section = $_POST['class_section'];

    // Validate the form input (optional)
    // Here you can perform validation checks on the input data, such as checking for empty fields or validating the email format.

    // Create a connection
    $conn = mysqli_connect($host, $user, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO users (name, email) VALUES ('$first_name', '$last_name', '$course', '$year_level', '$class_section')";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "Record created successfully.";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>