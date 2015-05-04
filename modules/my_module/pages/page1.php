<?php
	
	require_once 'modules/my_module/model/testmodel.class.php';
	
	$smarty->assign('model', new testModel());
	$smarty->display("modules/my_module/templates/page1.tpl");
?>