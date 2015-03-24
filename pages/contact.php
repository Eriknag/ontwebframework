<?php
/*
 * We gebruiken de Smarty Template Engine. Deze library is
 * gedownload en uitgepakt in de folder Smarty-3.1.18
 */
include('lib/Smarty-3.1.18/libs/Smarty.class.php');
include('model/sitemodel.class.php');
include('model/contactmodel.class.php');

// create object
$smarty = new Smarty;

$site = new SiteModel();
$smarty->assign('site', $site);

/*
 * Aauthorisatie (mag deze pagina worden geopend?)	
 */
session_start(); 
// Nothing TO DO	
	
// Controleer of form wordt opgevraagd of ingestuurd
if (isset($_POST['send'])) {
	// Form ingestuurd: Verwerken maar
	$model = new ContactModel($site);
	$model->sendMail();			
}
	 
// Renderen van de template
$smarty->display('templates/contact.tpl');
