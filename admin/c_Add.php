<?php
	    
	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();


	$sql_table = $_GET['sql_table'] ;


	if(	$sql_table==$TB_TYPES){


	/*	$id = $_REQUEST['id'] ;
		$value = $_REQUEST['value'] ;
		$column = $_REQUEST['columnName'] ;
		$columnPosition = $_REQUEST['columnPosition'] ;
		$columnId = $_REQUEST['columnId'] ;
		$rowId = $_REQUEST['rowId'] ;
	*/


		$name = $_REQUEST['name'] ;
		$description = $_REQUEST['description'] ;
		$color = $_REQUEST['color'] ;


		$id = 0;

		/* Add new record and place id of the new record into the $id variable */ 
		echo $id;


		/*

			$fp = fopen('add.txt', 'w');
			fwrite($fp, $name);
			fwrite($fp, "\n");
			fwrite($fp, $description);
			fwrite($fp, "\n");
			fwrite($fp, $color);
			fclose($fp);*/

				
		if(isset($name)){ $name = mysql_real_escape_string(htmlentities($name, ENT_QUOTES, "UTF-8")); };
		if(isset($description)){ $description = mysql_real_escape_string(htmlentities($description, ENT_QUOTES, "UTF-8")); };

		$result = mysql_query("INSERT INTO ".$sql_table." (name, description, color) VALUES ('".$name."','".$description."','".$color."')" );

		echo $_REQUEST['name']; // Important, for not alert !  or id ????

	}




	if(	$sql_table==$TB_PRODUCTS){


		/*

			$fp = fopen('add.txt', 'w');
			fwrite($fp, $name);
			fwrite($fp, "\n");
			fwrite($fp, $description);
			fwrite($fp, "\n");
			fwrite($fp, $color);
			fclose($fp);*/



	}











?>



