<?php
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $course = $_POST['course'];
    $yearLevel = $_POST['year_level'];
    $classSection = $_POST['class_section'];

    // Prepare the SQL statement
    $sql = "UPDATE students SET first_name = '$firstName', last_name = '$lastName', course = '$course', year_level = '$yearLevel', class_section = '$classSection' WHERE id = $id";

    // Execute the SQL statement
    $updateResult = mysqli_query($conn, $sql);

    // Check if the query was successful and return a response
    if ($updateResult) {
        echo "success";
    } else {
        echo "error";
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "Student not found";
    }
}
?>
