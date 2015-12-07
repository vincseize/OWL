<?php
 
/*
 * Following code will list all from Table
 */

// array for JSON response
$action_key = "83abec5a494b89095d07e031445de903"; 

// array for JSON response
$response = array();
 

if(isset($_POST['action_key'])==$action_key || isset($_GET['action_key'])==$action_key){

    if (isset($_POST['action_key']) == $action_key || isset($_GET['action_key']) == $action_key) {

        // include db connect class
        // require_once __DIR__ . '/db_connect.php';

        require_once("../../__Globals.php");

        require_once '../db_connect.php';
         
        // connecting to db
        $db = new DB_CONNECT();
         

        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET utf8");



        // get all from table
        $result = mysql_query($GET_ALL_TB_TYPES) or die(mysql_error());
        if (mysql_num_rows($result) > 0) {
            $response_type["types"] = array();   
            while ($row = mysql_fetch_array($result)) {
                $product = array();
                $product["id"] = $row["id"];
                $product["name"] = $row["name"];
                $product["comments"] = $row["description"];
                $product["color"] = $row["color"];
                array_push($response_type["types"], $product);
            }
            // success
            $response_type["success"] = 1;
         
            // echoing JSON response
            // echo json_encode($response_type);
            json_encode($response_type);
        } else {
            // no found
            $response_type["success"] = 0;
            $response_type["message"] = "No found";
         
            json_encode($response_type);
        }


// echo json_encode($response_type);



function searchJson_type($response_type,$id) {
    foreach($response_type["types"] as $type) {
        if($type['id'] == $id) {
            //echo "id = " . $type['name'];
            $name_type = $type['name'];
            $description_type = $type['comments'];
            $color_type = $type['color'];
            return array($name_type,$description_type,$color_type);
        }
    }
}






/*


echo "<br>";
echo "--------------------------------------------<br><br>";
//$rep_type = get_type($response_type);
// $rep_type = searchJson_type($response_type,"10");
$get_type = searchJson_type($response_type,"10");
$name_typet = $get_type[0];
$description_typet = $get_type[1];
$color_typet = $get_type[2];
echo $name_typet;
echo "<br>";
echo $description_typet;
echo "<br>";
echo $color_typet;
echo "<br><br>--------------------------------------------<br><br>";
echo "<br>";


*/


/*$json = json_decode($response_type);
foreach($json->people as $item)
{
    if($item->id == "62")
    {
        echo $item->name;
    }
}*/



        // get all from table
        $result = mysql_query($GET_ALL_TB_PRODUCTS) or die(mysql_error());
         
        // check for empty result
        if (mysql_num_rows($result) > 0) {
            // looping through all results
            // nodes
            $response["centres"] = array();
         
            while ($row = mysql_fetch_array($result)) {

                // todo unify array

                // temp array
                $product = array();
                $product["id"] = $row["id"];
                $product["name"] = $row["name"];

                $product["localisation_x"] = $row["localisation_x"];
                $product["localisation_y"] = $row["localisation_y"];


                $product["ville"] = $row["ville"];
                $product["adresse"] = $row["adresse"];
                $product["code_postal"] = $row["code_postal"];
                $product["pays"] = $row["pays"];
         
                $product["comments"] = $row["comments"];

                $product["phone"] = $row["phone"];
                $product["id_type"] = $row["id_type"];
                $id_type = $row["id_type"];




/*
                                                                        $result2 = mysql_query("SELECT * FROM owl_types WHERE id=$id_type") or die(mysql_error());
                                                                        if (mysql_num_rows($result2) > 0) {
                                                                            while ($row2 = mysql_fetch_array($result2)) {
                                                                                $product["description_type"] = $row2["comments"];
                                                                                $product["color_type"] = $row2["color"];
                                                                                $product["name_type"] = $row2["name"];
                                                                            }      
                                                                        }
                                                                        else{
                                                                            $product["description_type"] = "";
                                                                            $product["color_type"] = "";
                                                                            $product["name_type"] = "";
                                                                        }

*/


                                                                            $product["description_type"] = "";
                                                                            $product["color_type"] = "";
                                                                            $product["name_type"] = "";
                                                                     

                                                                        $get_type = searchJson_type($response_type,$id_type);
                                                                        $product["name_type"] = $get_type[0];
                                                                        $product["description_type"] = $get_type[1];
                                                                        $product["color_type"] = $get_type[2];
                                                                       





                // push single into final response array
                array_push($response["centres"], $product);
            }
            // success
            $response["success"] = 1;
         
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no found
            $response["success"] = 0;
            $response["message"] = "No found";
         
            echo json_encode($response);
        }

    }

}



?>