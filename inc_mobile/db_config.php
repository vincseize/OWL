
<?php
 
/*
 * All database connection variables
 */
 


// server infos
$host = $_SERVER['HTTP_HOST'];
// echo $host;

if($host=='127.0.0.1'){
	$host = '127.0.0.1';
	$dbname='owl';	
	$user='root';
	// $passwd='aa161169';
	$passwd='';
}

if(	$host=='localhost'){
	$host = 'localhost';
	$dbname='owl'; 
	$user='root';
	$passwd='';
}

if ($host=='www.vincseize.net'){
	$host = 'db569638194.db.1and1.com';
	$dbname='db569638194'; 
	$user='dbo569638194';
	//$passwd='zz161169';
	$passwd='lesinvisible';
}

if ($host=='vincseize.net'){
	$host = 'db569638194.db.1and1.com';
	$dbname='db569638194'; 
	$user='dbo569638194';
	//$passwd='zz161169';
	$passwd='lesinvisible';
}



define('DB_USER', $user); // db user
define('DB_PASSWORD', $passwd); // db password (mention your db password here)
define('DB_DATABASE', $dbname); // database name
define('DB_SERVER', $host); // db server


// tables names

$TB_PRODUCTS = "owl_products"; 
$GET_ALL_TB_PRODUCTS = "SELECT * FROM ".$TB_PRODUCTS."  ORDER BY nom ASC";

$TB_TYPES = "owl_types"; 
$GET_ALL_TB_TYPES = "SELECT * FROM ".$TB_TYPES."  ORDER BY nom ASC";

?>