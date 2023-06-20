<?php
include_once ("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $id = $_POST['studentId'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $class_section = $_POST['class_section'];

    // Perform the update operation in the database
    // Assuming you have a database connection established

    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE students SET first_name=?, last_name=?, course=?, year_level=?, class_section=? WHERE id=?");
    $stmt->bind_param("sssssi", $first_name, $last_name, $course, $year_level, $class_section, $id);

    // Execute the update statement
    if ($stmt->execute()) {
        // Update successful
        header("Location: ../admin.php");
    } else {
        // Update failed
        echo "Update failed";
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
