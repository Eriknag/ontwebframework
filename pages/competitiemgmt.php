<?php
/**
 * Dit script vervult de controller rol voor Gebruikersbeheer. Requests die op deze pagina landen
 * worden hier verwerkt naar eventuele acties op UsersModel waarna vervolgens de juiste Smarty 
 * template wordt geladen en gerendered.
 */	

// Model van deze pagina laden
require_once('model/competitiemodel.class.php');
$model = new CompetitieModel($site);
	
/**
 * Afhankelijk van de toestand nu de juiste actie uitvoeren
 * 
 */		
if ($site->request=='GET' && $site->action=='EDIT') {
	// GET:NEW/EDIT - AJAX call voor details JSON informatie
	if (!isset($_GET['id'])) {
		$site->error = "Formulier fout";
		exit();
	}
	$itemid = $_GET['id'];
	$item = $model->findItem($itemid);
	echo json_encode($item);
} else {
	if ($site->request=='GET' && $site->action=='VALIDATE') {
		// AJAX call om een veld te valideren
		if (!isset($_GET['field']) && !isset($_GET['value'])) {
			// TODO print an error and die
			echo json_encode("Onbekende fout. Neem contact op met uw ontwikkelaar.");
		} else {
			$field = $_GET['field'];
			$value = $_GET[$field];
			switch($field) {
				// Er zijn hier nog geen velden om te valideren...
				default : // Print error
					echo json_encode("Onbekende fout. Neem contact op met uw ontwikkelaar.");
			}
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
	}
}
 
 


	
?>