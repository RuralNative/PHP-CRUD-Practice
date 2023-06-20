<?php
include_once ("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $id = $_POST['studentIdValue'];

$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../admin.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>