<?php /* Smarty version Smarty-3.1.18, created on 2015-01-06 12:56:20
         compiled from "templates\competitie.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271045468d1f0a2c756-00803681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c5166f0b17cccda5eba1c7109e998f7923020d9' => 
    array (
      0 => 'templates\\competitie.tpl',
      1 => 1416238758,
      2 => 'file',
    ),
    '376bda8a84b789eb141d242742fd61f35a438f97' => 
    array (
      0 => '.\\templates\\site.tpl',
      1 => 1416396124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271045468d1f0a2c756-00803681',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5468d1f0b03514_49127062',
  'variables' => 
  array (
    'site' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5468d1f0b03514_49127062')) {function content_5468d1f0b03514_49127062($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>Teamindeling</title>
  <meta name="description" content="">
  <meta name="author" content="waar0003">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
	<!-- Bootstrap -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" 
	   href="css/style.css"/>

</head>

<body style="padding-top: 70px;">
	<div class="container">
		<nav class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">DBSTest</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li <?php if ($_smarty_tpl->tpl_vars['site']->value->page=='about.php') {?>class="active"<?php }?>><a href="about.php">Over ons</a></li>
		      	<li <?php if ($_smarty_tpl->tpl_vars['site']->value->page=='game.php') {?>class="active"<?php }?>><a href="game.php">Game corner</a></li>
		      	<li <?php if ($_smarty_tpl->tpl_vars['site']->value->page=='contact.php') {?>class="active"<?php }?>><a href="contact.php">Contact</a></li>
		      	<?php if ($_smarty_tpl->tpl_vars['site']->value->isLoggedin()) {?>
		      	<?php }?>
		      </ul>
				<ul class="nav navbar-nav navbar-right">
				    <?php if ($_smarty_tpl->tpl_vars['site']->value->isLoggedin()) {?>
					    <li class="dropdown">
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['site']->value->account->getAuthenticatedUsername();?>
 <span class="caret"></span></a>
					        <ul class="dropdown-menu" role="menu">
					      		<li><a href="usermgmt.php">Gebruikersbeheer</a></li>
					      		<li><a href="competitiemgmt.php">Competitiebeheer</a></li>
						        <li class="divider"></li>
						        <li><a id="profile" href="#">Profiel</a></li>
						        <li class="divider"></li>
						        <li><a href="login.php?action=logoff">Afmelden</a></li>
					        </ul>
				    <?php } else { ?>
						 <!-- <li><a id="login" href="#">Log in</a></li> -->
				          <li class="dropdown" id="menuLogin">
				            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
				            <div class="dropdown-menu" style="width:300px; padding:17px;">
				              <form class="form" id="formLogin" role="form" action="login.php"  method="post"> 
										 <label>Login</label>
										 <input  type="text" class="form-control" name="userid" placeholder="Gerbuikersnaam"/>
										 <input  type="password" class="form-control" name="passwd" placeholder="Wachtwoord"/>
										 <br/>
				        		<button type="submit" class="btn btn-primary">Inloggen</button>
				              </form>
				            </div>
				          </li>

				    <?php }?>
				    </li>
				</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<?php if ($_smarty_tpl->tpl_vars['site']->value->hasErrors()) {?>
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span><span class="sr-only">Sluiten</span>
				</button>
				<span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $_smarty_tpl->tpl_vars['site']->value->error;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['site']->value->hasSuccess()) {?>
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span><span class="sr-only">Sluiten</span>
				</button>
				<span class="glyphicon glyphicon-saved"></span> <?php echo $_smarty_tpl->tpl_vars['site']->value->success;?>

			</div>
		<?php }?>
		
		
	
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
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['model']->value->readItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<tr>
				<td><input type="checkbox" class="cbDelete" id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"></td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
</td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->klasse;?>
</td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->teamnaam;?>
</td>
			</tr>
			<?php } ?>
	  </table>
	</div>

				
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
	

		
		
		<div class="modal fade" id="loginform" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="loginform" id="detailsform" role="form" action="login.php"  method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Sluiten</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Inloggen</h4>
						</div>
		  				<div class="modal-body">
							<div class="form-group">
								 <label class="control-label" for="userid">Gebruikersnaam</label>
								 <input  type="text" class="form-control" name="userid"/>
							</div>		 
							<div class="form-group">
								 <label class="control-label" for="passwd">Wachtwoord</label>
								 <input  type="password" class="form-control" name="passwd"/>
							</div>
		  				</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
			        		<button type="submit" class="btn btn-primary" id="btnSubmitDetails">Inloggen</button>
			      		</div>
			      	</form>
		      	</div>
			</div>
		</div>

		
	</div>
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/jquery/jquery.validate.min.js"></script>
	<script src="lib/jquery/jquery.loadJSON.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/site.js"></script>
	
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

</body>
</html>
<?php }} ?>
