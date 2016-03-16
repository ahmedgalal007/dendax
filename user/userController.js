
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});

// Add validation rules for the phone field
$('#msgForm').validate({
	rules: {
	         	phone: {
			digits: true,
			phoneUS: true
		}
	}
});


// Clear the form  after sending the message.
function clearForm(){
	$('#name').val('');
	$('#email').val('');
	$('#phone').val('');
	$('#message').val('');
}

// Send JQuery Ajax  Post request to save the user message and vaildate the form inputs.
function sendMessage (){
	
	if ($('#msgForm').valid()) {
		$data = {"name" : $('#name').val(), "email" : $('#email').val(), "phone" : $('#phone').val(), "message" : $('#message').val()};

		$.ajax({
			 type: 'POST',
			 url: '/services/user.php',
			 dataType: "json",
			 data: JSON.stringify($data),
			 complete: function(data) {
			 	//alert(JSON.stringify(data));
			 	clearForm();
			 	$('#helpBlock').html('Your Message has been sent -- ' ); // result
			 	
			 }
		});

	}else{
		$('#helpBlock').html('Please review your inputs, And fill the required fields.' ); // result
	};

		
}



