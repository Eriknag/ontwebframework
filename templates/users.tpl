{extends file="site.tpl"}
{block name=title}Gebruikersbeheer{/block}
{block name=script}
	<script src="js/usermgmt.js"></script>
{/block}
{block name=main}
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h3>Gebruikersbeheer</h3></div>
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
	  <table id="userstable" class="table table-striped table-hover">
	  	<tr>
	  		<th></th>
	  		<th>Gebruikersnaam</th>
	  		<th>Voornaam</th>
	  		<th>Achternaam</th>
	  		<th>Email adres</th>
	  		<th>Telefoonnummer</th>
	  	</tr>
			{foreach $model->readUsers() as $user}
			<tr>
				<td><input type="checkbox" class="cbDelete" id="{$user->userid}"></td>
				<td class="btnEdit" id="{$user->userid}">{$user->userid}</td>
				<td class="btnEdit" id="{$user->userid}">{$user->firstname}</td>
				<td class="btnEdit" id="{$user->userid}">{$user->lastname}</td>
				<td class="btnEdit" id="{$user->userid}">{$user->email}</td>
				<td class="btnEdit" id="{$user->userid}">{$user->telephone}</td>
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
						<form name="detailsform" id="detailsform" role="form" action=""  method="post">
				
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
  						Verwijderen gebruiker(s): <span id="user_namespan"></span>?
						<form name="confirmdeleteform" id="confirmdeleteform" role="form" action=""  method="post">
							<input type="hidden" name="action" value="delete"/>
							<input type="hidden" name="userid_list" value=""/>
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
	<div id="userlist" class="list-group">	
	</div>
	<div id="content" class="right">
		<div id="messages">
		</div>
		<div id="details">
			
		</div>
	</div>

{/block}