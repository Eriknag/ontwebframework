<?php 
	session_start(); 
	include_once('userstorage.php');
   	include_once('servervalidation.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Week 07 ajax demo</title>
		<link rel="stylesheet" type="text/css" 
           href="css/style.css"/>
	</head>
	<body>
		<?php include 'header.php' ?>
		<main>
			<?php	
			// Controleer of form wordt opgevraagd of ingestuurd
		    if (isset($_POST['send'])) {
		    	// Form ingestuurd: Verwerken maar
								
			    // Als eerste stap controleren en valideren we alle data uit het form
			    if(!isset($_POST['user_name']) ||
			        !isset($_POST['first_name']) ||
			        !isset($_POST['last_name']) ||
			        !isset($_POST['email']) ||
			        !isset($_POST['telephone']) ||
			        !isset($_POST['password'])) {
			        died('Het lijkt er op dat het formulier dat u gebruikt niet klopt.');       
			    } 
				
				$user_name = $_POST['user_name']; // required and not exists
			    $first_name = $_POST['first_name']; // required
			    $last_name = $_POST['last_name']; // required
			    $email_from = $_POST['email']; // required
			    $telephone = $_POST['telephone']; // not required
			    $password = $_POST['password']; // Required

			    // error_message wordt gevuld als er foutberichten zijn 
			    $error_message = "";
				$error_message .= checkLength('Gebruikersnaam', $user_name, TRUE, 3);
				if(usernameExists($user_name))
					$error_message .= 'De opgegeven gebruikersnaam bestaat al.<br/>';
				$error_message .= checkIsTekst('Voornaam', $first_name, TRUE);
				$error_message .= checkIsTekst('Achternaam', $last_name, TRUE);
				$error_message .= checkIsEmail('Email adres', $email_from, TRUE);
				$error_message .= checkLength('Wachtwoord', $password, TRUE, 4);

				// Er is iets mis als de lengte van error_message > 0
				if(strlen($error_message) > 0) {
				    died($error_message);
				}
				
				addUser($user_name, $password, $first_name, $last_name, $email_from, $telephone);

				echo '<p>Gebruiker is geregistreerd.</p>';
		    } else {
		    	// Het form laten zien...
		    	?>
			<form name="input" 
				  id="registerform"
			      action="" 
			      method="post"
			      style="width: 850px; margin-left: auto; margin-right: auto">
				<input type="hidden" name="send" value="true"/>
				<h1>Registreer een nieuwe gebruiker</h1>
				<table width="850px">
					<tr>
						 <td><label for="first_name">Gebruikersnaam *</label></td>
						 <td><input  type="text" id="user_name" name="user_name" maxlength="50" size="30"></td>
						 <td><span id="user_nameValResult"> </span></td>
					</tr>		 
					<tr>
						 <td><label for="first_name">Voornaam *</label></td>
						 <td><input  type="text" id="first_name" name="first_name" maxlength="50" size="30"></td>
						 <td><span id="first_nameValResult"> </span></td>
					</tr>		 
					<tr>
						 <td><label for="last_name">Achternaam *</label></td>
						 <td><input  type="text" id="last_name" name="last_name" maxlength="50" size="30"></td>
						 <td><span id="last_nameValResult"> </span></td>
					</tr>
					<tr>
						 <td><label for="email">Email Adres *</label></td>
						 <td><input  type="text" id="email" name="email" maxlength="80" size="30"></td>		 
						 <td><span id="emailValResult"> </span></td>		 
					</tr>
					<tr>
						 <td><label for="telephone">Telefoon Nummer</label></td>
						 <td><input  type="text" id="telephone" name="telephone" maxlength="30" size="30"></td>
						 <td><span id="telephoneValResult"> </span></td>
					</tr>
					<tr>
						 <td><label for="comments">Wachtwoord *</label></td>
						 <td><input  type="password" id="password" name="password" maxlength="1000" cols="25" rows="6"></input></td>
						 <td><span id="commentsValResult"> </span></td>
					<tr>
						<td colspan="2" style="text-align:center"><input type="submit" value="Verstuur"></td>
					</tr>
				</table>
			</form><?php
		    } // sluit de if ?>
		</main>
		<script src="lib/jquery/jquery.min.js"></script>
		<script src="js/validate.js"></script>

	</body>
</html>
