/**
 * @author waar0003
 */
$(document).ready(function() {
	$('#btnInsert').click(function() {
		$('#detailsform').html('<p><img src="css/waiting.gif"></img></p>');
		$('#detailsform').load('?page=gebruikersbeheer&action=NEW');
		$('#details').modal();
	});	

	$('#btnSubmitDetails').click(function() {
		console.log('submit please');
		$('#detailsform').submit();
	});

	$('#detailsform').validate({
		rules: {
			username : {
				remote : '?page=gebruikersbeheer&action=VALIDATE&field=username'
			},
			email : {
				email : true
			}
		}
	});
	
});
