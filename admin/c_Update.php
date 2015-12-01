<?php
	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();

	$sql_table = $_GET['sql_table'] ;

	$id = $_REQUEST['id'] ;
	$value = $_REQUEST['value'] ;
	$column = $_REQUEST['columnName'] ;
	$columnPosition = $_REQUEST['columnPosition'] ;
	$columnId = $_REQUEST['columnId'] ;
	$rowId = $_REQUEST['rowId'] ;

/*		$fp = fopen('updateEdit.txt', 'w');
	fwrite($fp, $sql_table);
	fwrite($fp, "\n");	
	fwrite($fp, $_GET['id']);
	fwrite($fp, "\n");			
	fwrite($fp, $_GET['value']);
	fwrite($fp, "\n");
	fwrite($fp, $column);
	fclose($fp);*/
	
	if(isset($value)){ $value = mysql_real_escape_string(htmlentities($value, ENT_QUOTES, "UTF-8")); };

	$result = mysql_query("UPDATE ".$sql_table." set ".$column." = '".$value."' WHERE  id=".$id);

	echo $_REQUEST['value']; // Important, for not alert !  or id ????

?>



