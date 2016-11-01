$(function() {

	// Setup form validation on the #register-form element
	$("#register-form").validate({

	    // Specify the validation rules
	    rules: {
	        name: "required",
	        email: {
	            required: true,
	            email: true
	        },
	        password: {
	            required: true,
	            minlength: 5
	        }
	    },
	    
	    // Specify the validation error messages
	    messages: {
	        name: "Please enter your first name",
	        password: {
	            required: "Please provide a password",
	            minlength: "Your password must be at least 5 characters long"
	        },
	        email: "Please enter a valid email address"
	    },
	    
	    submitHandler: function(form) {
	        form.submit();
	    }
	});

	// Setup form validation on the #register-form element
	$("#login-form").validate({

	    // Specify the validation rules
	    rules: {
	        l_email: {
	            required: true,
	            email: true
	        },
	        l_password: {
	            required: true,
	            minlength: 5
	        }
	    },
	    
	    // Specify the validation error messages
	    messages: {
	        l_password: {
	            required: "Please provide a password",
	            minlength: "Your password must be at least 5 characters long"
	        },
	        l_email: "Please enter a valid email address"
	    },
	    
	    submitHandler: function(form) {
	        form.submit();
	    }
	});		

});