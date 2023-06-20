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

$(document).on('show.bs.modal', '#editEmployeeModal', function(event) {
    var link = $(event.relatedTarget); // Get the link that triggered the modal
    var studentId = link.data('student-id'); // Get the value of data-student-id attribute
    
    // Set the value in the form input field
    $('#studentIdInput').val(studentId);
});
  
  
  