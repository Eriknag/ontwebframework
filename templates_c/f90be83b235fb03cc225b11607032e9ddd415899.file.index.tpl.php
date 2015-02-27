<?php /* Smarty version Smarty-3.1.18, created on 2014-11-24 14:53:07
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2221554628b1d163181-67079594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90be83b235fb03cc225b11607032e9ddd415899' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1415744185,
      2 => 'file',
    ),
    '376bda8a84b789eb141d242742fd61f35a438f97' => 
    array (
      0 => '.\\templates\\site.tpl',
      1 => 1416396124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2221554628b1d163181-67079594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54628b1d1f78b1_68077217',
  'variables' => 
  array (
    'site' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54628b1d1f78b1_68077217')) {function content_54628b1d1f78b1_68077217($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>DBS test</title>
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
		
		
	<h1>Welkom</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum porta mi, at laoreet justo 
		pharetra vel. Proin at risus id nibh molestie feugiat. Phasellus felis nunc, aliquam non 
		tristique in, pharetra a tortor. Quisque ut dapibus tellus. Maecenas non risus bibendum, 
		hendrerit leo sed, hendrerit tortor. Cras non risus mollis, tempus arcu nec, volutpat lorem. 
		Nam eget sollicitudin est. Proin euismod volutpat risus id consequat. Phasellus id nunc ex. 
		Nulla massa nisi, dignissim ac metus et, ultricies rhoncus ex. Fusce eget velit a metus 
		vehicula ornare.
	</p>
	<p>Quisque porttitor magna viverra est lobortis scelerisque. Pellentesque nec ligula vitae libero 
		mollis efficitur. Quisque quis dui non neque dapibus egestas. Sed blandit nulla felis. Phasellus 
		dignissim metus sit amet dui cursus tincidunt. Sed hendrerit magna vitae libero lobortis, sed 
		commodo velit rutrum. Proin luctus imperdiet mauris, ut dapibus enim volutpat nec. Suspendisse 
		dapibus fermentum sem vitae imperdiet.
	</p>		

		
		
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
	
</body>
</html>
<?php }} ?>
