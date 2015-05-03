<?php
// controleer of uitloggen
if (isset($_GET['action']) && $_GET['action']==='logoff') {
	$site->account->unauthenticateUser();
	$site->success = "Succesvol uitgelogd.";
} else {
	$loginTry = isset($_POST['username']) && isset($_POST['passwd']);
	// Controleer op inloggen 
	if ($loginTry) {
		$username = strip_tags($_POST['username']);
		$passwd = strip_tags($_POST['passwd']);
		if ($site->account->authenticateUser($username, $passwd)) {
			$site->success = "Ingelogd. Welkom!";
		} else {
			// Fout.
			$site->error = "Ongeldige gebruikersnaam of wachtwoord.";
		}
	}
}
