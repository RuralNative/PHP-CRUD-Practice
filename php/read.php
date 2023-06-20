<?php
  require_once 'config.php';
  
  $sql = "SELECT * FROM students";

   // Execute the SQL statement
   $result = mysqli_query($conn, $sql);

   // Check if the query was successful
   if ($result) {
       // Loop through the result set
       while ($row = mysqli_fetch_assoc($result)) {
           // Access the retrieved data
           $id = $row['id'];
           $first_name = $row['first_name'];
           $last_name = $row['last_name'];
           $course = $row['course'];
           $year_level = $row['year_level'];
           $class_section = $row['class_section'];

           // Display the data in the table row
           echo "<tr>";
           echo "<td><span class='custom-checkbox'><input type='checkbox' id='checkbox1' name='options[]' value='1'><label for='checkbox1'></label></span></td>";
           echo "<td>$id</td>";
           echo "<td>$first_name</td>";
           echo "<td>$last_name</td>";
           echo "<td>$course</td>";
           echo "<td>$year_level</td>";
           echo "<td>$class_section</td>";
           echo "<td><a href='#editEmployeeModal' class='edit' data-toggle='modal' data-target='#editEmployeeModal' data-student-id='{$id}'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a><a href='#deleteEmployeeModal' class='delete' data-toggle='modal' data-target='#editEmployeeModal' data-student-id='{$id}'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a></td>";
           echo "</tr>";
       }
   }
?>