<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cenphilian - Admin</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript/admin_script.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="stylesheets/admin_stylesheet.css"/>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Cenphilian: Student <b>Database</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="index.html" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>					
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Course</th>
							<th>Year Level</th>
							<th>Class Section</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require_once 'php/read.php';
						?>
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="editForm" method="POST" action="php/update.php">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="number" class="form-control" id="studentIdInput" name="studentId">
						</div>					
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" required>
						</div>
						<div class="form-group">
							<label>Course</label>
							<input type="text" class="form-control" name="course" required>
						</div>
						<div class="form-group">
							<label>Year Level</label>
							<input type="text" class="form-control" name="year_level" required>
						</div>
						<div class="form-group">
							<label>Class Section</label>
							<input type="text" class="form-control" name="class_section" required>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
	$(document).ready(function() {
	$(document).on('show.bs.modal', '#editEmployeeModal', function(event) {
	  var link = $(event.relatedTarget);
	  console.log(link); // Check the value of link
	  var studentId = link.data('student-id');
	  console.log(studentId); // Check the value of studentId
	  
	  var studentIdInput = $('#studentIdInput');
	  console.log(studentIdInput); // Check the value of studentIdInput
  
	  studentIdInput.val(studentId);
	});
  	});
	</script>

	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="deleteForm" method="POST" action="php/delete.php">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="studentIdValue" name="studentIdValue">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
	$(document).ready(function() {
	$(document).on('show.bs.modal', '#deleteEmployeeModal', function(event) {
	  var link = $(event.relatedTarget);
	  console.log(link); // Check the value of link
	  var studentId = link.data('student-id-value');
	  console.log(studentId); // Check the value of studentId
	  
	  var studentIdInput = $('#studentIdValue');
	  console.log(studentIdInput); // Check the value of studentIdInput
  
	  studentIdInput.val(studentId);
	});
  	});
	</script>
</body>
</html>
