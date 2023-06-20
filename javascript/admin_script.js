$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});

$(document).on('click', '.edit', function(){
    var id = $(this).data('id');
    // Make an AJAX request to retrieve the student's information based on the ID
    $.ajax({
        url: 'php/get_student.php',
        type: 'GET',
        data: { id: id },
        success: function(response){
            // Populate the form fields in the editEmployeeModal with the retrieved information
            var student = JSON.parse(response);
            $('#editEmployeeModal input[name="first_name"]').val(student.first_name);
            $('#editEmployeeModal input[name="last_name"]').val(student.last_name);
            $('#editEmployeeModal input[name="course"]').val(student.course);
            $('#editEmployeeModal input[name="year_level"]').val(student.year_level);
            $('#editEmployeeModal input[name="class_section"]').val(student.class_section);
            $('#editEmployeeModal form').attr('action', 'php/update.php?id=' + student.id);
        }
    });
});
