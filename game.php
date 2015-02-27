<?php
	
/*
 * We gebruiken de Smarty Template Engine. Deze library is
 * gedownload en uitgepakt in de folder Smarty-3.1.18
 */
include('lib/Smarty-3.1.18/libs/Smarty.class.php');
include('model/sitemodel.class.php');

// create object
$smarty = new Smarty;

$site = new SiteModel();
$smarty->assign('site', $site);

/*
 * Aauthorisatie (mag deze pagina worden geopend?)	
 */
session_start(); 
// Nothing TO DO	
	
// Data aan de tempalte toevoegen	
$smarty->assign('page', basename($_SERVER["PHP_SELF"]));
// Renderen van de template
$smarty->display('templates/game.tpl');
?>