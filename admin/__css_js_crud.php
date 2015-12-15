<!-- CSS -->
<style type="text/css" media="screen">

	@import "../media_datatables/demo_page.css";
	@import "../media_datatables/demo_table.css";
	@import "../media_datatables/site_jui.css";
	@import "../media_datatables/demo_table_jui.css";
	@import "../media_datatables/jquery-ui.css";
	@import "../media_datatables/jquery-ui-1.7.2.custom.css";
	/*
	 * Override styles needed due to the mix of three different CSS sources! For proper examples
	 * please see the themes example in the 'Examples' section of this site
	 */
	.dataTables_info { padding-top: 0; }
	.dataTables_paginate { padding-top: 0; }
	.css_right { float: right; }
	#example_wrapper .fg-toolbar { font-size: 0.8em }
	#theme_links span { float: left; padding: 2px 10px; }

	.addRow {
		background: #3498db;
		background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
		background-image: -moz-linear-gradient(top, #3498db, #2980b9);
		background-image: -ms-linear-gradient(top, #3498db, #2980b9);
		background-image: -o-linear-gradient(top, #3498db, #2980b9);
		background-image: linear-gradient(to bottom, #3498db, #2980b9);
		-webkit-border-radius: 12;
		-moz-border-radius: 12;
		border-radius: 12px;
		font-family: Arial;
		color: #ffffff;
		font-size: 16px;
		padding: 10px 20px 10px 20px;
		text-decoration: none;
		}

	.addRow:hover {
		background: #3cb0fd;
		background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
		background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
		background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
		background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
		background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
		text-decoration: none;
	}

	/*
	 * Hide Default Datatable buttons in toolbar
	 */
	#btnDeleteRow{display:none;}
	#btnAddNewRow{display:none;}

</style>

<!-- js -->
<script type="text/javascript" src="../media_datatables/complete.js"></script>
<script type="text/javascript" src="../media_datatables/jquery.min.js"></script>
<script type="text/javascript" src="../media_datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../media_datatables/jquery.dataTables.editable.js"></script>
<script type="text/javascript" src="../media_datatables/jquery.jeditable.js"></script>
<script type="text/javascript" src="../media_datatables/jquery-ui.js"></script>
<script type="text/javascript" src="../media_datatables/jquery.validate.js"></script>

<!-- php general var -->
<?php

    // to do merge with __css_js_crud.php
    $db_handle = new DBController();
    $types = $db_handle->runQuery($GET_ALL_TB_TYPES);
	$n_types  = count($types);
    $products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
    // to do merge with __css_js_crud.php

	if(explode("_",$this_filename)[1]=="products"){$GET_ALL_TB_ELEMENTS = $GET_ALL_TB_PRODUCTS;$sql_table = $TB_PRODUCTS;}
	    if(explode("_",$this_filename)[1]=="types"){$GET_ALL_TB_ELEMENTS = $GET_ALL_TB_TYPES;$sql_table = $TB_TYPES;}
	    
	    $elements = $db_handle->runQuery($GET_ALL_TB_ELEMENTS);

	    //////////////////////////////////////////////// GET or create colum name ///////////////////////////////////////////
	    $arrayNameCols = array();
	    $result = mysql_query("SHOW COLUMNS FROM $sql_table");
	    if (mysql_num_rows($result) > 0) {
	      while ($row = mysql_fetch_assoc($result)) {
	        // print_r($row); // all infos
	        // print_r($row['Field']);
	        // we hide id column
	        if($row['Field']!="id"){$arrayNameCols[] = $row['Field'];}
	        
	    }
	 }

?>