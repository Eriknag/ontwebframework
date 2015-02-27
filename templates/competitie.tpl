{extends file="site.tpl"}
{block name=title}Teamindeling{/block}
{block name=script}
<script>
	$(document).ready(function() {
		$('#btnInsert').click(function() {
			// In de wchtstand zetten
			$('#detailswait').css( "display", "block" );
			$('#detailsform').css( "display", "none" );
			// Laten zien
			$('#details').modal();
			// Form leegmaken
			$("#detailsform input[type=text], textarea").val('');
			// De 'action' input instellen op new, zodat submit een nieuw item toevoegt
			$('#detailsform input[name=action]').val('new');
			// Uit de wachtstand halen
			$('#detailswait').css( "display", "none" );
			$('#detailsform').css( "display", "block" );
		});	
		
		$('.btnEdit').click(function(event) {
			// In de wchtstand zetten
			$('#detailswait').css( "display", "block" );
			$('#detailsform').css( "display", "none" );
			// Laten zien
			$('#details').modal();
			// De 'action' input instellen op new, zodat submit een nieuw item toevoegt
			$('#detailsform input[name=action]').val('update');
			// mbv AJAX een json object ophalen met detailgegevens van het geselecteerde data-item
			var fieldID = $(this).attr('id');
			$.getJSON("?action=edit&id=" + fieldID, function(data){
				// Vul alle velden in het form met de data. Daarvoor moeten de name van een input en de 
				// key van het json-object exact gelijk zijn aan elkaar
				$.each(data, function(key, value){
					$('#detailsform input[name=' + key + ']').val(value);
				});
				// Uit de wachtstand halen
				$('#detailswait').css( "display", "none" );
				$('#detailsform').css( "display", "block" );
  			});
		});	
		
		$('#btnSubmitDetails').click(function() {
			$('#detailsform').submit();
		});
	
		$('#btnDelete').click(function() {
			var selected = [];
			$('#datatable input:checked').each(function() {
			    selected.push($(this).attr('id'));
			});
			$('#itemidspan').html(selected);
			$( "#confirmdeleteform input[name='itemid_list']" ).val(selected);
			$('#confirmdelete').modal();
		});
			
		$('#btnSubmitDelete').click(function() {
			$('#confirmdeleteform').submit();
		});
	
		
		
	});
</script>
{/block}
{block name=main}
	{* Het panel waar de data in komt te staan *}
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h3>Competitieindeling</h3></div>
	  <div class="panel-body">
		<div class="btn-group">
		  	<button type="button" id="btnInsert" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<button type="button" id="btnDelete" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-trash"></span>
			</button>
		</div>
	  </div>
	  <!-- Table -->
	  <table id="datatable" class="table table-striped table-hover">
	  	<tr>
	  		<th></th>
	  		<th>ID</th>
	  		<th>Klasse</th>
	  		<th>Team</th>
	  	</tr>
			{foreach $model->readItems() as $item}
			<tr>
				<td><input type="checkbox" class="cbDelete" id="{$item->id}"></td>
				<td class="btnEdit" id="{$item->id}">{$item->id}</td>
				<td class="btnEdit" id="{$item->id}">{$item->klasse}</td>
				<td class="btnEdit" id="{$item->id}">{$item->teamnaam}</td>
			</tr>
			{/foreach}
	  </table>
	</div>

	{* Het formulier voor het bewerken van de gebruikersdetails *}			
	<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="detailsLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">
    						<span aria-hidden="true">&times;</span>
    						<span class="sr-only">Sluiten</span>
    					</button>
    					<h4 class="modal-title" id="myModalLabel">Gebruiker details</h4>
  					</div>
      				<div class="modal-body">
      					<div id="detailswait" style="display: none"><img src="css/waiting.gif"></img></div>
						<form name="detailsform" id="detailsform" role="form" action=""  method="post">
							<input type="hidden" name="action" value="new"/>
							<input type="hidden" name="id" value=""/>
							<div class="form-group">
								 <label class="control-label" for="klasse">Klasse *</label>
								 <input  type="text" class="form-control" name="klasse" 
								 		required value=""/>
							</div>		 
							<div class="form-group">
								 <label class="control-label" for="teamnaam">Team naam *</label>
								 <input  type="text" class="form-control" name="teamnaam" 
								 		required value=""/>
							</div>
							<input type="submit" style="display:none" />
				      	</form>
      				</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
		        		<button type="button" class="btn btn-primary" id="btnSubmitDetails">Opslaan</button>
		      		</div>
	      	</div>
		</div>
	</div>
	
	{* Het formulier voor het bevestigen van een verwijdering *}
	<div class="modal fade" id="confirmdelete" tabindex="-1" role="dialog" aria-labelledby="confirmdeleteLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">
    						<span aria-hidden="true">&times;</span>
    						<span class="sr-only">Sluiten</span>
    					</button>
    					<h4 class="modal-title" id="myModalLabel">Bevestig verwijderen</h4>
  					</div>
      				<div class="modal-body">
  						Verwijderen gebruiker(s): <span id="itemidspan"></span>?
						<form name="confirmdeleteform" id="confirmdeleteform" role="form" action=""  method="post">
							<input type="hidden" name="action" value="delete"/>
							<input type="hidden" name="itemid_list" value=""/>
							<input type="submit" style="display:none" />				
				      	</form>
      				</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
		        		<button type="button" class="btn btn-primary" id="btnSubmitDelete">Verwijderen</button>
		      		</div>
	      	</div>
		</div>
	</div>
	
{/block}