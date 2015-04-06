<?php
	
/*
 * We gebruiken de Smarty Template Engine. Deze library is
 * gedownload en uitgepakt in de folder Smarty-3.1.21
 */
include('lib/Smarty-3.1.21/libs/Smarty.class.php');
include('model/sitemodel.class.php');

// create object
$smarty = new Smarty;
$site = new SiteModel();
$smarty->assign('site', $site);
session_start();
//$smarty->assign('page', basename($_SERVER["PHP_SELF"]));
echo $site->page;

//if(isset($_GET['page'])) $site->page = $_GET['page'];
//if(isset($_GET['module'])) $site->module = $_GET['module']."/";
//if(isset($_GET['action'])) $site->action = $_GET['action'];

if(isset($_GET['page'])) echo $_GET['page']."\n";
if(isset($_GET['module'])) echo $_GET['module']."/"."\n";
if(isset($_GET['action'])) echo $_GET['action']."\n";

if(!$site->isDefaultPage()) include($site->getPage());
else $smarty->display($site->getTemplate()); 

?>