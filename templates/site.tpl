<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>{block name=title}Default Page Title{/block}</title>
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
	   
	<!-- Font Awesome -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
		      <a class="navbar-brand" href="/">Ontweb</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        {foreach from=$menu item=module}
		        	{if $module.name eq ""}
		        		{foreach from=$module.pages item=page}
		      				<li><a href={$page.uri}>{$page.pagename}</a></li>
		      			{/foreach}
		      		{else}
		      			{if $module.page_amount eq 1}
		      				<li><a href={$module.pages[0].uri}>{$module.name}</a></li>
		      			{else}
		      				<li class="dropdown">
		      					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{$module.name}</a>
			      				<ul class="dropdown-menu" role="menu">
			      					{foreach from=$module.pages item=page}
		      							<li><a href={$page.uri}>{$page.pagename}</a></li>
		      						{/foreach}
			      				</ul>
		      				</li>
		      			{/if}
		      		{/if}
		      	{/foreach}
		      </ul>
				<ul class="nav navbar-nav navbar-right">
				    {if $site->isLoggedin()}
					    <li class="dropdown">
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$site->account->getAuthenticatedUsername()} <span class="caret"></span></a>
					        <ul class="dropdown-menu" role="menu">
						        <li><a id="profile" href="#">Profiel</a></li>
						        <li><a href="?page=login&action=logoff">Afmelden</a></li>
					        </ul>
				    {else}
				          <li class="dropdown" id="menuLogin">
				            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
				            <div class="dropdown-menu" style="width:300px; padding:17px;">
				              <form class="form" id="formLogin" role="form" action="?page=login"  method="post"> 
										 <label>Login</label>
										 <input  type="text" class="form-control" name="username" placeholder="Gerbuikersnaam"/>
										 <input  type="password" class="form-control" name="passwd" placeholder="Wachtwoord"/>
										 <br/>
				        		<button type="submit" class="btn btn-primary">Inloggen</button>
				              </form>
				            </div>
				          </li>

				    {/if}
				    </li>
				</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		{if $site->hasErrors()}
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span><span class="sr-only">Sluiten</span>
				</button>
				<span class="glyphicon glyphicon-exclamation-sign"></span> {$site->error}
			</div>
		{/if}
		{if $site->hasSuccess()}
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span><span class="sr-only">Sluiten</span>
				</button>
				<span class="glyphicon glyphicon-saved"></span> {$site->success}
			</div>
		{/if}
		
		{block name=main}{/block}
		
		{* Modal voor het inloggen*}
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
								 <label class="control-label" for="username">Gebruikersnaam</label>
								 <input  type="text" class="form-control" name="username"/>
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

		{block name=modals}{/block}
	</div>
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/jquery/jquery.validate.min.js"></script>
	<script src="lib/jquery/jquery.loadJSON.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/site.js"></script>
	{block name=script}{/block}
</body>
</html>
