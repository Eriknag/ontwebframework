$(document).ready(function() {
	$('#login').click(function() {
		$('#loginform').modal();
	});
	
	
	/*
	 * Dit zorgt ervoor dat jquery.validation de Bootstrap Form opbouw kan manipuleren.
	 * 
	 * Code overgenomen van: 
	 */
	$.validator.setDefaults({
	    errorElement: "span",
	    errorClass: "help-block",
	    highlight: function (element, errorClass, validClass) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $(element).closest('.form-group').removeClass('has-error');
	    },
	    highlight: function(element) {
        	$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
 		},
    	unhighlight: function(element) {
        	$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    	},
	    errorPlacement: function (error, element) {
	        if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});	
	

	
});
