{extends file="site.tpl"}
{block name=title}Gebruikersbeheer{/block}
{block name=script}
	<script src="js/usermgmt.js"></script>
{/block}
{block name=main}
	{$site->action}
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h3>Gebruikersbeheer</h3></div>
	  <div class="panel-body">
	  	<table id="userstable" class="table table-striped table-hover">
		  	<tr>
		  		<th>Gebruikersnaam</th>
		  		<th>Voornaam</th>
		  		<th>Achternaam</th>
		  		<th>Email adres</th>
		  		<th>Telefoonnummer</th>
			</tr>
			{foreach $model->readUsers() as $user}
			<tr>
				<td class="btnEdit" id="{$user->username}">{$user->username}</td>
				<td class="btnEdit" id="{$user->username}">{$user->firstname}</td>
				<td class="btnEdit" id="{$user->username}">{$user->lastname}</td>
				<td class="btnEdit" id="{$user->username}">{$user->email}</td>
				<td class="btnEdit" id="{$user->username}">{$user->telephone}</td>
			</tr>
			{/foreach}
		</table>
		<div class="btn-group">
		  	<button type="button" id="btnInsert" class="btn btn-default btn-sm">
				<i class="fa fa-user-plus"> Gebruiker Toevoegen</i>
			</button>
		</div>
	  </div>
	  <!-- Table -->
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
						<form name="detailsform" id="detailsform" role="form" action="" method="post">
				
				      	</form>
      				</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
		        		<button type="button" class="btn btn-primary" id="btnSubmitDetails">Opslaan</button>
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