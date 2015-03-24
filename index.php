<?php
	
/*
 * We gebruiken de Smarty Template Engine. Deze library is
 * gedownload en uitgepakt in de folder Smarty-3.1.21
 */
include('lib/Smarty-3.1.21/libs/Smarty.class.php');
include('model/sitemodel.class.php');
require_once('util/formvalidationtools.php');

// create object
$smarty = new Smarty;
$site = new SiteModel();
$smarty->assign('site', $site);
session_start();
$smarty->assign('page', basename($_SERVER["PHP_SELF"]));

/**
* TODO: module structuur
*
**/	
if(isset($_GET['page']) && !isset($_GET['module'])){
	$phpfile = 'pages/'.$_GET['page'].'.php';
	if(file_exists($phpfile)){
		include($phpfile);
	}else{
		$site->error += " Error loading file: ".$phpfile.".";
	}
	// Renderen van de template
	if(isset($_GET['template'])){
		$tplfile = 'templates/'.$_GET['template'].'.tpl';
		if(file_exists($tplfile)) $smarty->display($tplfile);
		else $site->error += " Error loading file: ".$tplfile.".";
	}else{
		$tplfile = 'templates/'.$_GET['page'].'.tpl';
		if(file_exists($tplfile)) $smarty->display($tplfile);
		else $site->error += " Error loading file: ".$tplfile.".";
	}
}
elseif(isset($_GET['module']) && isset($_GET['page'])){
	$moduledir = "modules/".$_GET['module']."/";
	$phpfile = $moduledir.'pages/'.$_GET['page'].'.php';
	if(file_exists($phpfile)){
		include($phpfile);
	}else{
		$site->error += " Error loading file: ".$phpfile.".";
	}
	// Renderen van de template
	if(isset($_GET['template'])){
		$tplfile = $moduledir.'templates/'.$_GET['template'].'.tpl';
		if(file_exists($tplfile)) $smarty->display($tplfile);
		else $site->error += " Error loading file: ".$tplfile.".";
	}else{
		$tplfile = $moduledir.'templates/'.$_GET['page'].'.tpl';
		if(file_exists($tplfile)) $smarty->display($tplfile);
		else $site->error += " Error loading file: ".$tplfile.".";
	}
}else{
	$smarty->display('templates/index.tpl');
}
?>