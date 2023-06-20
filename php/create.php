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

    // Prepare the SQL statement
    $sql = "INSERT INTO students (first_name, last_name, course, year_level, class_section) VALUES ('$first_name', '$last_name', '$course', '$year_level', '$class_section')";

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