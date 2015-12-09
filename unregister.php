<?php
@session_start(); 
@session_unset(oid);
@session_destroy(oid);
header("location: index.php");
?>