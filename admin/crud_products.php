<?php

    require_once("../__Globals.php");
    require_once("__dbcontroller.php");
    $db_handle = new DBController();
    $types = $db_handle->runQuery($GET_ALL_TB_TYPES);
    $products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
    $this_filename = explode(".",__FILE__)[0];
    $this_container = "container_".explode("_",$this_filename)[1].".php";
    $ch = explode("_",$this_filename)[1];

	include('__css_js_crud.php'); // don't touch emplacement

    // CONFIG
    $elements = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
    $sql_table = $TB_PRODUCTS;
    $arrayNameCols = array('nom','localisation_x','localisation_y','ville','code_postal','adresse','pays','comments','phone','type');  

?>


<!-- http://www.laktek.com/2008/10/27/really-simple-color-picker-in-jquery/ 
<script language="javascript" type="text/javascript" src="../js/jquery.colorPicker.js"/></script>-->
<script language="javascript" type="text/javascript" src="../js/owl.js"/></script>
<link rel="stylesheet" href="../css/colorPicker.css" type="text/css" />


<script type="text/javascript" charset="utf-8">

	// to unify with types
	function VerifColor_Type(ListColors,id,tb_sql,columnName){

	    var ObjListe = document.getElementById(ListColors); 
	    var SelIndex = ObjListe.selectedIndex; 
	    var SelValue = encodeURIComponent(ObjListe.options[ObjListe.selectedIndex].value); 
	    var SelText = ObjListe.options[ObjListe.selectedIndex].text; 

	    // var id = id;
	    // var columnName = "color";
	    var color = SelValue;

	    $.post('c_Update.php?sql_table='+tb_sql+'&columnName='+columnName+'&id='+id+'&value='+color+'');
	    // $( "#home_container" ).load( "container_types.php" ); // todo better refresh
	    $(this).parent().load("<?php echo $this_container; ?>"); // todo better refresh

	    /*
	    if(color!="New_Color"){
	        $.post('c_Update.php?sql_table='+tb+'&columnName='+columnName+'&id='+id+'&value='+color+'');
	        $( "#home_container" ).load( "edit_types.php" );
	    }

	    if(color=="New_Color"){
	        $( "#dialog_newColor" ).dialog(); 
	    }
	    */

	}



	function Select_Type(){
	    var ObjListe = document.getElementById("ListTypes"); 
	    var SelIndex = ObjListe.selectedIndex; 
	    var SelValue = encodeURIComponent(ObjListe.options[ObjListe.selectedIndex].value); 
	    var SelText = ObjListe.options[ObjListe.selectedIndex].text; 

	    var id_type = SelValue;

	    var type = document.getElementById("type");
	    type.value = id_type;


		// $(this).parent().load("<?php echo $this_container; ?>"); // todo better refresh
		// onChange css color select to change

	}


	$(document).ready( function () {

		// default form add type select value
		Select_Type();

		// var id = -1;	//for simulation 
		var tb = "<?php echo $sql_table; ?>";
		var ch = "<?php echo $ch; ?>";

		// add new row
/*		var t = $('#example').DataTable();
		var counter = 1;
							$('#addRow').on( 'click', function () {




							        t.row.add( [
							            counter +'Click Here to  ',
							            counter +'.2',
							            counter +'.3',
							            counter +'.4',
							            counter +'.5',
							            counter +'.6',
							            counter +'.7',
							            counter +'.8',							            
							            counter +'.9',
							            counter +'.10'
							        ] ).draw( false );
							 
							        counter++;
							    } );

						    // Automatically add a first row of data
						    // $('#addRow').click();*/




var oTable = $('#example').dataTable( {
	retrieve: true,
    paging: false,
    searching: false

} );

oTable.fnDestroy();
			// oTable.fnDraw(false);

    var nEditing = null;
$('#addRow').click( function (e) {
    e.preventDefault();
 
    var aiNew = oTable.fnAddData( [ '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Click here to modify', '', '', '', '','', '', '','','' ] ); // &nbsp; for first row
    var nRow = oTable.fnGetNodes( aiNew[0] );
    // editRow( oTable, nRow );
    nEditing = nRow;
    
    $.post( "c_Add.php?sql_table="+tb ); // todo refresh

	// oTable.fnDestroy();
	// oTable.fnDraw();

	$(this).parent().load("<?php echo $this_container; ?>");

} );









		$('#example').dataTable({ bJQueryUI: true,"sPaginationType": "full_numbers",}).makeEditable({
		// $('#example').dataTable({ bJQueryUI: true,"sPaginationType": "full_numbers","sDom": '<"H"<"toolbar">fr>t<"F"ip>',}).makeEditable({



		// $('#example').dataTable().makeEditable({ :: simply
							/*sUpdateURL: function(value, settings)
							{
                     							return(value); //Simulation of server-side response using a callback function
							},*/


							// 












							// sDom: '<"toolbar">frtip',


							sUpdateURL: "c_Update.php?sql_table="+tb,						
                     		sAddURL: "c_Add.php?sql_table="+tb, // todo rowdata not defined bug non bloquant
/*										success: function(data) {
										                console.log("add done")
										            },*/


                     		sAddHttpMethod: "GET",
                            sDeleteHttpMethod: "GET",
							sDeleteURL: "c_Delete.php?sql_table="+tb,
										
									
            							"aoColumns": [

            									// col 1 nom
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            										callback : function(value, settings) { // to refresh, or what yoy want
												        // console.log(this);
												        // console.log(value);
												        // console.log(settings);												       
												    }
            									},

            									// col 2 loc x
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 3 loc y
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 4 ville
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 5 code postal
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 6 adresse
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 7 pays
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}
            									},

            									// col 8 comments
            									{ 	
        									        indicator: 'Saving ...',
													type: 'textarea',
                                         			submit:'Save',
            										callback : function(value, settings) {}                                         			
            									},

            									// col 9 phone
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}
            									},

            									// col 10 Type type, null for own html content, here type: select
            									null,

									

									],



/*"fieldErrors": [
        {
            "name":   "nom",
            "status": "This field is required"
        },
        {
            "name":   "type",
            "status": "This field is required"
        }
    ],*/








							oAddNewRowButtonOptions: {	
											label: "Add...",
											icons: {primary:'ui-icon-plus'} 

							},

							oDeleteRowButtonOptions: {	
											label: "Remove", 
											icons: {primary:'ui-icon-trash'}
							},

							oAddNewRowFormOptions: { 	
                                            title: 'Add',
											show: "blind",
											hide: "blind",
											// hide: "explode",
                                            modal: true
                                            // oTable.fnDraw()
							}	,
							

							sAddDeleteToolbarSelector: ".dataTables_length"	,	




		});
	





										// $("#example").fnDestroy().dataTable();
										// $("#example").fnDestroy().dataTable();


										// console.log("tesst return");



	








} );









$('div.toolbar').html('<b>Custom tool bar! Text/images etc.</b>');









</script>




<body id="index" class="grid_2_3">
		
<style>
.form-container {
   border: 1px solid #f2e3d2;
   background: #c9b7a2;
   background: -webkit-gradient(linear, left top, left bottom, from(#f2e3d2), to(#c9b7a2));
   background: -webkit-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -moz-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -ms-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -o-linear-gradient(top, #f2e3d2, #c9b7a2);
   background-image: -ms-linear-gradient(top, #f2e3d2 0%, #c9b7a2 100%);
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:500px;
   padding:20px;
   width:500px;
   }


.form-field {
   border: 1px solid #c9b7a2;
   background: #e4d5c3;
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   color: #c9b7a2;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   padding:8px;
   margin-bottom:10px;
   width:200px;
   }

.form-field:focus {
   background: #fff;
   color: #725129;
   }
.form-container h2 {
   text-shadow: #fdf2e4 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #725129;
   text-shadow: #fdf2e4 0 1px 0;
   }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-button {
   border: 1px solid #447314;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #addc7e 0 1px 0;
   color: #31540c;
   font-family: helvetica, serif;
   padding: 8.5px 18px;
   font-size: 14px;
   text-decoration: none;
   vertical-align: middle;
   }
.submit-button:hover {
   border: 1px solid #447314;
   text-shadow: #31540c 0 1px 0;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   color: #fff;
   }
.submit-button:active {
   text-shadow: #31540c 0 1px 0;
   border: 1px solid #447314;
   background: #8dc059;
   background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
   background: -webkit-linear-gradient(top, #6aa436, #8dc059);
   background: -moz-linear-gradient(top, #6aa436, #8dc059);
   background: -ms-linear-gradient(top, #6aa436, #8dc059);
   background: -o-linear-gradient(top, #6aa436, #8dc059);
   background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
   color: #fff;
   }
</style>



<!-- <form class="form-container">
<div class="form-title"><h2>Sign up</h2></div>
<div class="form-title">Name</div>
<input class="form-field" type="text" name="firstname" /><br />
<div class="form-title">Email</div>
<input class="form-field" type="text" name="email" /><br />
<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" />
</div>
</form>





 -->


	<button id="addRow" name="addRow">+ Add <?php echo $nom_product;?> ...</button>



	<!-- ADD with form modal -->
	<!-- to do hide on load -->

	<!--  todo, better submit refresh  -->
	<form id="formAddNewRow" action="#" title="Add" style="background: #c9b7a2;display:none;">
	    
		<input placeholder="Nom" class="form-field" type="text" name="nom" id="nom" rel="0" required/>*

	    <br />

		<input placeholder="Localisation x" class="form-field" type="localisation_x" name="localisation_x" id="description" rel="1" required/>*

	    <br />

		<input placeholder="Localisation y" class="form-field" type="text" name="localisation_y" id="localisation_y" rel="2" required/>*

	    <br />

		<input placeholder="Ville" type="text" class="form-field" name="ville" id="ville" rel="3" />

	    <br />

		<input placeholder="Code Postal" type="text" class="form-field" name="code_postal" id="code_postal" rel="5" />

	    <br />

		<input placeholder="Adresse" type="text" class="form-field" name="adresse" id="adresse" rel="4" />

	    <br />

		<input placeholder="Pays" type="text" class="form-field" name="pays" id="pays" rel="6" />

	    <br />

		<textarea placeholder="Comments"  class="form-field" rows="3" cols="30" name="comments" id="comments" rel="7" ></textarea>

	    <br />

		<input placeholder="Phone"  class="form-field" type="text" name="phone" id="phone" rel="8" />

	    <br />

		<input placeholder="Type"  class="form-field" type="text" name="type" id="type" rel="9" style="visibilityx:hidden"/>
		<label for="ListTypes">Type*</label>

				<?php
										// to do, background color, from unique select from commun to list and option
										echo "<select id='ListTypes' name='ListTypes' onchange=\"Select_Type();\" style=\"width:100%;height:100%;border:0px;outline:0px\">*"; 
											// todo owl_types  from globals, and conform with crud types.php
							              	$sql2 = $db_handle->runQuery("SELECT * FROM ".$TB_TYPES."");
							              	if(!empty($sql2)) {
												foreach($sql2 as $kk=>$vv) {
													$type_id 		= utf8_decode($sql2[$kk]["id"]);
													$type_name 		= utf8_decode($sql2[$kk]["name"]);
													$type_color 	= utf8_decode($sql2[$kk]["color"]);
													$selected		= "";
													if($type_id==$elements_id_type){$selected="selected";}
													if($elements_id_type=="0"){$type_name="No Type Selected";} // debug todo better
													echo "<option style=\"background-color:".$type_color.";width:100%;\" value='".$type_id."' $selected>".$type_name."</option>"; 

												}
											}

										echo "</select>"; 
				?>



	</form>
	<!-- ADD with form modal -->




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
					echo "<td width='10%;'>";


						echo "<select id='ListTypes_".$elements_id."' onchange=\"VerifColor_Type('ListTypes_".$elements_id."','".$elements_id."','".$sql_table."','Id_Type');\" style=\"width:100%;height:100%;border:0px;outline:0px\"  >"; 
							// todo owl_types  from globals, and conform with crud types.php
			              	$sql2 = $db_handle->runQuery("SELECT * FROM ".$TB_TYPES."");
			              	if(!empty($sql2)) {
								foreach($sql2 as $kk=>$vv) {
									$type_id 		= utf8_decode($sql2[$kk]["id"]);
									$type_name 		= utf8_decode($sql2[$kk]["name"]);
									$type_color 	= utf8_decode($sql2[$kk]["color"]);
									$selected		= "";
									if($type_id==$elements_id_type){$selected="selected";}
									if($elements_id_type=="0"){$type_name="No Type Selected";} // debug todo better
									echo "<option style=\"background-color:".$type_color.";width:100%;\" value='".$type_id."' $selected>".$type_name."</option>"; 

								}
							}

						echo "</select>"; 


					echo "</td>";
						

					echo "</td>";

				echo "</tr>";

			}
		}


		?>	


		</tbody>


	</table>
				


				
	</body>

</html>