<?php

    require_once("../__Globals.php");
    require_once("__dbcontroller.php");
    $db_handle = new DBController();
    $types = $db_handle->runQuery($GET_ALL_TB_TYPES);
    $products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
    $this_filename = explode(".",__FILE__)[0];
    $this_container = "container_".explode("_",$this_filename)[1].".php";

	include('__css_js_crud.php'); // don't touch emplacement

    // CONFIG
    $elements = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
    $sql_table = $TB_PRODUCTS;
    $arrayNameCols = array('nom','localisation_x','localisation_y','ville','code_postal','adresse','pays','comments','phone','id_type');  

?>


<!-- http://www.laktek.com/2008/10/27/really-simple-color-picker-in-jquery/ 
<script language="javascript" type="text/javascript" src="../js/jquery.colorPicker.js"/></script>-->
<script language="javascript" type="text/javascript" src="../js/owl.js"/></script>
<link rel="stylesheet" href="../css/colorPicker.css" type="text/css" />


<script type="text/javascript" charset="utf-8">

	$(document).ready( function () {

		// var id = -1;	//for simulation 
		var tb = "<?php echo $sql_table; ?>";

		$('#example').dataTable({ bJQueryUI: true,"sPaginationType": "full_numbers"}).makeEditable({
		// $('#example').dataTable().makeEditable({
							/*sUpdateURL: function(value, settings)
							{
                     							return(value); //Simulation of server-side response using a callback function
							},*/

							sUpdateURL: "c_Update.php?sql_table="+tb,						
                     		sAddURL: "c_Add.php?sql_table="+tb, // todo rowdata not defined bug non bloquant
                     		sAddHttpMethod: "GET",
                            sDeleteHttpMethod: "GET",
							sDeleteURL: "c_Delete.php?sql_table="+tb,
            							"aoColumns": [

            									// col 1 
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 2
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 3
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 4
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 5
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 6
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 7
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 8
            									{ 	
        									        indicator: 'Saving ...',
                                                    //tooltip: 'Double Click to edit',
													type: 'textarea',
                                         			submit:'Save'
            									},

            									// col 9
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},

            									// col 10
            									{
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            									},


									

									],



							oAddNewRowButtonOptions: {	label: "Add...",
											icons: {primary:'ui-icon-plus'} 
							},

							oDeleteRowButtonOptions: {	label: "Remove", 
											icons: {primary:'ui-icon-trash'}
							},

							oAddNewRowFormOptions: { 	
                                            title: 'Add',
											show: "blind",
											hide: "blind",
											// hide: "explode",
                                            modal: true
							}	,
							

							sAddDeleteToolbarSelector: ".dataTables_length"								

		});
		
} );


</script>




<body id="index" class="grid_2_3">
		
	<!-- to do hide on load -->

	<!--  todo, better submit refresh  -->
	<form id="formAddNewRow" action="#" title="Add" style="width:600px;min-width:600px">
	    
	    <label for="name">Nom</label><br />
		<input type="text" name="name" id="name" rel="0" />

	    <br />

	    <label for="description">Localisation x</label><br />
		<input type="text" name="description" id="description" rel="1" />

	    <br />

	    <label for="name">Localisation y</label><br />
		<input type="text" name="name" id="name" rel="2" />

	    <br />

	    <label for="description">Ville</label><br />
		<input type="text" name="description" id="description" rel="3" />
<<<<<<< HEAD

	    <br />

	    <label for="name">Code Postal</label><br />
		<input type="text" name="name" id="name" rel="4" />

	    <br />

	    <label for="description">Adresse</label><br />
		<input type="text" name="description" id="description" rel="5" />

	    <br />

	    <label for="name">Pays</label><br />
		<input type="text" name="name" id="name" rel="6" />

	    <br />

	    <label for="description">Description</label><br />
		<textarea rows="4" cols="50" name="description" id="description" rel="7" ></textarea>

	    <br />
	   	<label for="name">Phone</label><br />
		<input type="text" name="name" id="name" rel="8" />

	    <br />

=======

	    <br />

	    <label for="name">Code Postal</label><br />
		<input type="text" name="name" id="name" rel="4" />

	    <br />

	    <label for="description">Adresse</label><br />
		<input type="text" name="description" id="description" rel="5" />

	    <br />

	    <label for="name">Pays</label><br />
		<input type="text" name="name" id="name" rel="6" />

	    <br />

	    <label for="description">Description</label><br />
		<textarea rows="4" cols="50" name="description" id="description" rel="7" ></textarea>

	    <br />
	   	<label for="name">Phone</label><br />
		<input type="text" name="name" id="name" rel="8" />

	    <br />

>>>>>>> refs/remotes/origin/Crud-Product
	    <label for="name">Type</label><br />
		<input type="text" name="name" id="name" rel="9" />

	</form>





	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		

		<thead>
			<tr>
				<?php
					foreach ($arrayNameCols as $value){
					    echo "<th>".ucfirst ($value)."</th>";
					}
				?>
			</tr>
		</thead>
		<tfoot>
			<tr>

				<?php
					foreach ($arrayNameCols as $value){
					    echo "<th>".ucfirst ($value)."</th>";
					}
				?>
			</tr>

		</tfoot>


		<tbody>


		<?php

		if(!empty($elements)) {
			foreach($elements as $k=>$v) {

				$elements_id 				= $elements[$k]["id"];

				$elements_nom 				= utf8_decode($elements[$k]["nom"]); // to do ??? , find a simplification relation with column name array
				$elements_localisation_x 	= utf8_decode($elements[$k]["localisation_x"]);
				$elements_localisation_y 	= utf8_decode($elements[$k]["localisation_y"]);				
				$elements_ville 			= utf8_decode($elements[$k]["ville"]);
				$elements_code_postal 		= utf8_decode($elements[$k]["code_postal"]);	
				$elements_adresse 			= utf8_decode($elements[$k]["adresse"]);
				$elements_pays 				= utf8_decode($elements[$k]["pays"]);				
				$elements_comments 			= utf8_decode($elements[$k]["comments"]);
				$elements_phone 			= utf8_decode($elements[$k]["phone"]);	
				$elements_id_type 			= utf8_decode($elements[$k]["id_type"]);

				echo "<tr id=".$elements_id.">";

					echo "<td width='16%;'>".$elements_nom."</td>";
					echo "<td width='2%;'>".$elements_localisation_x."</td>";
					echo "<td width='2%;'>".$elements_localisation_y."</td>";
					echo "<td>".$elements_ville."</td>";
					echo "<td width='2%;'>".$elements_code_postal."</td>";
					echo "<td>".$elements_adresse."</td>";
					echo "<td width='10%;'>".$elements_pays."</td>";
					echo "<td>".$elements_comments."</td>";
					echo "<td width='7%;'>".$elements_phone."</td>";
					echo "<td width='5%;'>".$elements_id_type."</td>";
						

					echo "</td>";

				echo "</tr>";

			}
		}


		?>	


		</tbody>


	</table>
				


				
	</body>

</html>