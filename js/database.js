/**
 * @author inirv_000
 */
$(document).ready(function() {

	$('#btnQuery').click(function() {
		console.log('submitting');
		$('#detailsform').html('<p><img src="css/waiting.gif"></img></p>');
		$('#detailsform').load('?page=database', $('#formQuery').serialize());
		$('#details').modal();
	});
});
