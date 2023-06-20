<?php
   require_once 'config.php';

   // Check if the form was submitted
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $id = $_POST['id'];
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $course = $_POST['course'];
     $year_level = $_POST['year_level'];
     $class_section = $_POST['class_section'];

     // Prepare the SQL statement
     $sql = "UPDATE students SET first_name = ?, last_name = ?, course = ?, year_level = ?, class_section = ? WHERE id = ?";
     $stmt = $conn->prepare($sql);

     // Bind the parameters
     $stmt->bind_param("sssssi", $first_name, $last_name, $course, $year_level, $class_section, $id);

     // Execute the statement
     if ($stmt->execute()) {
       // Redirect to the page where the table is displayed
       header("Location: ../admin.php");
       exit();
     } else {
       // Handle the error
       echo "Error updating student: " . $stmt->error;
     }

     // Close the statement
     $stmt->close();
   }
   ?>
