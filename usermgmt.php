<?php
/**
 * Dit script vervult de controller rol voor Gebruikersbeheer. Requests die op deze pagina landen
 * worden hier verwerkt naar eventuele acties op UsersModel waarna vervolgens de juiste Smarty 
 * template wordt geladen en gerendered.
 */	

// Smarty object laden
require_once('lib/Smarty-3.1.18/libs/Smarty.class.php');
$smarty = new Smarty;

// Sitemodel altijd laden
require_once('model/sitemodel.class.php');
$site = new SiteModel();
$smarty->assign('site', $site);

// Model van deze pagina laden
require_once('model/usersmodel.class.php');
$model = new UsersModel($site);
$smarty->assign('model', $model);

/*
 * Aauthorisatie (mag deze pagina worden geopend?)	
 */
session_start(); 
// Nothing TO DO	
	
/**
 * Afhankelijk van de toestand nu de juiste actie uitvoeren
 * 
 */		
if ($site->request=='GET' && ($site->action=='NEW' || $site->action=='EDIT')) {
	// GET:NEW/EDIT - AJAX call voor het details formulier
	// Details formulier laden
	// Als edit, dan huidige data laden
	if ($site->action=='EDIT') {
		if (!isset($_GET['userid'])) {
			$site->error = "Formulier fout";
			exit();
		}
		$model->setCurrentUser($_GET['userid']);
		$smarty->assign('action', 'update');
	} else {
		$smarty->assign('action', 'new');
	}
	// display it
	$smarty->display('templates/userdetails.tpl');
	
} else {
	if ($site->request=='GET' && $site->action=='VALIDATE') {
		// AJAX call om een veld te valideren
		if (!isset($_GET['field']) && !isset($_GET['value'])) {
			// TODO print an error and die
		}
		$field = $_GET['field'];
		$value = $_GET[$field];
		switch($field) {
			case 'userid' :
				if (!$model->useridExists($value)) {
					echo "true";
				} else {
					echo json_encode("Deze gebruikersnaam bestaat al");
				}
				break;
			default : // Print error
				echo json_encode("Onbekende fout. Neem contact op met uw ontwikkelaar.");
		}
	} else {	
		// POST:INSERT/UPDATE/DELETE of een gewone GET
		// Moet de hele pagina opnieuw renderen
		if ($site->request=='POST') {
			// Als POST:INSERT/UPDATE/DELETE - Wijziging verwerken
			switch($site->action) {
				case 'NEW' :
					$model->insert(); 
					break;
				case 'UPDATE' :
					$model->update();
					break;
				case 'DELETE' :
					$model->delete();
				default : // Print error
			}
		}		
		// Renderen van de template
		$smarty->display('templates/users.tpl');
	}
}
 
 


	
?>