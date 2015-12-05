<?php    

    require_once("../__Globals.php");
    require_once("__dbcontroller.php");
    $db_handle = new DBController();
/*    $get_db_products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
    $get_db_types = $db_handle->runQuery($GET_ALL_TB_TYPES);*/
    $this_filename = explode(".",__FILE__)[0];
    $this_container = "container_".explode("_",$this_filename)[1].".php";
    $ch = explode("_",$this_filename)[1];

	   include('__css_js_crud.php'); // don't touch emplacement


    if(explode("_",$this_filename)[1]=="products"){$GET_ALL_TB_ELEMENTS = $GET_ALL_TB_PRODUCTS;$sql_table = $TB_PRODUCTS;}
    if(explode("_",$this_filename)[1]=="types"){$GET_ALL_TB_ELEMENTS = $GET_ALL_TB_TYPES;$sql_table = $TB_TYPES;}
    
    $elements = $db_handle->runQuery($GET_ALL_TB_ELEMENTS);


?>