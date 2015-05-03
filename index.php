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
session_start();
$smarty->assign('site', $site);
if(strcmp($site->currentPage, "login") == 0) include($site->getPage());
$smarty->assign('menu', $site->getActivePages());

if(!$site->isDefaultPage() && strcmp($site->currentPage, "login") != 0) include($site->getPage());
else $smarty->display($site->getTemplate()); 

?>