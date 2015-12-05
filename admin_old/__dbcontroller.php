<?php
class DBController {

/*
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "samu_social";

	
	private $host = 'db569638194.db.1and1.com';
	private $user = 'dbo569638194';	
	private $password = 'lesinvisible';	
	private $database = 'db569638194'; 

*/

	private $host = "";
	private $user = "";
	private $password = "";
	private $database = "";
	private $host_get = "";




	
	function __construct() {

		$this->host_get = $_SERVER['HTTP_HOST'];

		if ( $this->host_get == "127.0.0.1" || $this->host_get == "localhost") {
			$this->host = "localhost";
			$this->user = "root";
			$this->password = "";
			$this->database = "owl";
		}

		if ( $this->host_get == "www.vincseize.net" || $this->host_get == "vincseize.net") {
			$this->host = "db569638194.db.1and1.com";
			$this->user = "dbo569638194";
			$this->password = "lesinvisible";
			$this->database = "db569638194";
		}

		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = @mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>