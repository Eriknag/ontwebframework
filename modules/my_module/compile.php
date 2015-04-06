<?php
	
/*
 * We gebruiken de Smarty Template Engine. Deze library is
 * gedownload en uitgepakt in de folder Smarty-3.1.21
 */
include('../../lib/Smarty-3.1.21/libs/Smarty.class.php');

// create object
$smarty = new Smarty;
$smarty->compileAllTemplates('.tpl',true);
?>