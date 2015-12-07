<?php
 
/*
 * Following code will list all from Table
 */


 

if(isset($_POST['action_key'])==$action_key || isset($_GET['action_key'])==$action_key){

    // array for JSON response
    $action_key = "83abec5a494b89095d07e031445de903"; 

    if (isset($_POST['action_key']) == $action_key || isset($_GET['action_key']) == $action_key) {

        // array for JSON response
        $response = array();
        $TB = $_POST['tb'];

        require_once("../../__Globals.php");
        require_once '../db_connect.php';
         
        // connecting to db
        $db = new DB_CONNECT();
         

        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET utf8");


        // get all from table
        $result = mysql_query($TB) or die(mysql_error());
         
        // check for empty result
        if (mysql_num_rows($result) > 0) {
            // looping through all results
            // nodes
            $response["types"] = array();
         
            while ($row = mysql_fetch_array($result)) {

                // todo unify array // // to do from tb mysql name  extract

                // temp array
                $product = array();
                $product["id"] = $row["id"];
                $product["name"] = $row["name"];
                $product["comments"] = $row["description"];
                $product["color"] = $row["color"];




                // push single into final response array
                array_push($response["types"], $product); // to do from tb name extract
            }
            // success
            $response["success"] = 1;
         
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no found
            $response["success"] = 0;
            $response["message"] = "No found";
         
            // echo no users JSON
            echo json_encode($response);
        }

    }

}



?>