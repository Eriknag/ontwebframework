<?php /* Smarty version Smarty-3.1.18, created on 2014-11-26 21:03:25
         compiled from "templates\users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76205457c820921920-94353670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e3e5ba5f255a61cee70738076f36df5be1f0023' => 
    array (
      0 => 'templates\\users.tpl',
      1 => 1416086437,
      2 => 'file',
    ),
    '376bda8a84b789eb141d242742fd61f35a438f97' => 
    array (
      0 => '.\\templates\\site.tpl',
      1 => 1416396124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76205457c820921920-94353670',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5457c820a293f0_02911208',
  'variables' => 
  array (
    'site' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5457c820a293f0_02911208')) {function content_5457c820a293f0_02911208($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>Gebruikersbeheer</title>
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
			<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['model']->value->readUsers(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
			<tr>
				<td><input type="checkbox" class="cbDelete" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
"></td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
</td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->firstname;?>
</td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
</td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</td>
				<td class="btnEdit" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->userid;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->telephone;?>
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
	
	<script src="js/usermgmt.js"></script>

</body>
</html>
<?php }} ?>
