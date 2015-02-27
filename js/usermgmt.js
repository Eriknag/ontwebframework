/**
 * @author waar0003
 */
$(document).ready(function() {
	$('#btnInsert').click(function() {
		$('#detailsform').html('<p><img src="css/waiting.gif"></img></p>');
		$('#detailsform').load('?action=new');
		$('#details').modal();
	});	
	
	$('#btnDelete').click(function() {
		var selected = [];
		$('#userstable input:checked').each(function() {
		    selected.push($(this).attr('id'));
		});
		console.log(selected);
		var fieldID = $(this).attr('id');
		$('#user_namespan').html(selected);
		$( "#confirmdeleteform input[name='userid_list']" ).val(selected);
		$('#confirmdelete').modal();
	});
		
	$('.btnEdit').click(function(event) {
		var fieldID = $(this).attr('id');
		console.log(fieldID);
		$('#detailsform').html('<p><img src="css/waiting.gif"></img></p>');
		$('#detailsform').load('?action=edit&userid=' + fieldID);
		$('#details').modal();
	});	
	
	$('#btnSubmitDelete').click(function() {
		$('#confirmdeleteform').submit();
	});

	
	$('#btnSubmitDetails').click(function() {
		console.log('submit please');
		$('#detailsform').submit();
	});

	$('#detailsform').validate({
		rules: {
			userid : {
				remote: '?action=validate&field=userid'
			},
			email : {
				email : true
			}
		}
	});
	
});
