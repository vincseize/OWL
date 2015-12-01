<?php

	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();

	$sql_table = $_GET['sql_table'] ;
	$id = $_REQUEST['id'] ;
	$value = $_REQUEST['value'] ;
	$columnName = $_REQUEST['columnName'] ;

	if(isset($value)){ $value = mysql_real_escape_string(htmlentities($value, ENT_QUOTES, "UTF-8")); };
	$result = mysql_query("UPDATE ".$sql_table." set ".$columnName." = '".$value."' WHERE  id=".$id);

	echo $_REQUEST['value']; // Important, for not alert !  or id ????

?>



