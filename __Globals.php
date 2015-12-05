<?php
 
/*
 * All globals variables
 * Author : Vincseize / LRDS 
 * Date : 2015 
 * Licence : creative common  
 */
 

	// UI
	$nom_project = 'OWL';	
	$nom_product = 'centre';	
	$nom_products = 'centres';	
	$nom_type = 'besoin';	
	$nom_types = 'besoins';	
	$height_header_home = '90';	// px todo
	$color_header_home = '#09F';	// todo
	$default_adminPage = 'list_products.php';
	// $default_adminPage = 'list_types.php'

	// LOG
	$login_admin = 'admin';	
	$password_admin = 'kangourou';		


	// PHP SECURE
	$CRUD_ACTION_KEY = '83abec5a494b89095d07e031445de903';	// to protect GET POST action from anywhere, you can enter any complex string


	// GOOGLE/OPENSTREET MAP
	$LRDS_GOOGLEMAP_API_KEY = 'AIzaSyAZrcwz_0WPemtr8E5brOi4fsFLPpc1VhQ'; // not obligatory, depends on your own GoogleMap API Key
	$tableid = 260197; // ???
	$center_x = 48.855011; // for map init position
	$center_y = 2.346724; // for map init position
	$zoom = 12; // for map init zoom
	$map_legend_title = $nom_types; 
	$map_legend_nota_bene = ""; 
	// $map_legend_nota_bene = "* note"; // sample


	// MYSQL
	$TB_PRODUCTS = "owl_products"; 
	$TB_TYPES = "owl_types"; 














	// DON T CHANGE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	define('OWL_VERSION','1.0');
	define('NOM_PROJECT',$nom_project);
	define('NOM_PRODUCT',$nom_product);
	define('NOM_PRODUCTS',$nom_products);
	define('NOM_TYPE',$nom_type);
	define('NOM_TYPES',$nom_types);
/*	$height_header_home = '90';	// px todo
	$color_header_home = '#09F';	// todo*/
	define('LOGIN_ADMIN',$login_admin);
	define('PASSWORD_ADMIN',$password_admin);

	$GET_ALL_TB_PRODUCTS = "SELECT * FROM ".$TB_PRODUCTS."  ORDER BY name ASC";
	$GET_ALL_TB_TYPES = "SELECT * FROM ".$TB_TYPES."  ORDER BY name ASC";

	$GET_ALL_TB_PRODUCTS_URL = "inc_mobile/CRUD_centres/get_all_centres.php?action_key=".$CRUD_ACTION_KEY;
	$GET_ALL_TB_TYPES_URL = "inc_mobile/CRUD_centres/get_all_types.php?action_key=".$CRUD_ACTION_KEY;

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>