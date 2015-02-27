<?php
//Sessie starten zodat het login systeem werkt 
session_start();

	// Sitemodel altijd laden
include('model/sitemodel.class.php');
$site = new SiteModel();

// controleer of uitloggen
if (isset($_GET['action']) && $_GET['action']==='logoff') {
	$site->account->unauthenticateUser();
	$site->success = "Succesvol uitgelogd.";
} else {
	$loginTry = isset($_POST['userid']) && isset($_POST['passwd']);
	// Controleer op inloggen 
	if ($loginTry) {
		$username = strip_tags($_POST['userid']);
		$passwd = strip_tags($_POST['passwd']);
		if ($site->account->authenticateUser($username, $passwd)) {
			$site->success = "Ingelogd. Welkom!";
		} else {
			// Fout.
			$site->error = "Ongeldige gebruikersnaam of wachtwoord.";
		}
	}
}

// Smarty object laden
require_once('lib/Smarty-3.1.18/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->assign('site', $site);
$smarty->display('templates/index.tpl');
