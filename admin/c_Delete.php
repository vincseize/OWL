<?php
	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();

	$sql_table = $_GET['sql_table'] ;

	$id = $_REQUEST['id'] ;
	

/*	$fp = fopen('delete.txt', 'w');
	fwrite($fp, $id);
	fwrite($fp, "\n");
	fwrite($fp, $sql_table);
	fclose($fp);*/


	if(	$sql_table==$TB_TYPES){


		$result = mysql_query("DELETE FROM ".$sql_table." WHERE id='".$id."' ");

		echo "ok"; // Important, for not alert !  or id ????

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



