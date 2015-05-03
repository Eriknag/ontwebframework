<?php
if ($site->request=='GET' && ($site->action=='QUERY')) {
	$result = $site->mysqli->query($_GET['inpQuery']);
	if($result != null && $result->num_rows > 0){
		
		//get headers
		$resultfield = $result->fetch_fields();
		$fields = Array();
		foreach($resultfield as $f){
			array_push($fields, $f->name);
		}
		$smarty->assign('resultFields', $fields);
		
		$resultset = $result->fetch_all(MYSQLI_NUM);
		$smarty->assign('result', $resultset);
		
		$smarty->display("templates/queryresult.tpl");
	}
	else{
		echo "geen resultaat";
	}
}else{
	$smarty->display("templates/database.tpl");
}
?>