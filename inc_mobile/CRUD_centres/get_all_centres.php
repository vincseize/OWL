<?php
 
/*
 * Following code will list all from Table
 */

// array for JSON response
$action_key = "83abec5a494b89095d07e031445de903"; 

// array for JSON response
$response = array();
 

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}



function RGB_TO_HSV($R, $G, $B)    // RGB values:    0-255, 0-255, 0-255
{                                // HSV values:    0-360, 0-100, 0-100
    // Convert the RGB byte-values to percentages
    $R = ($R / 255);
    $G = ($G / 255);
    $B = ($B / 255);

    // Calculate a few basic values, the maximum value of R,G,B, the
    //   minimum value, and the difference of the two (chroma).
    $maxRGB = max($R, $G, $B);
    $minRGB = min($R, $G, $B);
    $chroma = $maxRGB - $minRGB;

    // Value (also called Brightness) is the easiest component to calculate,
    //   and is simply the highest value among the R,G,B components.
    // We multiply by 100 to turn the decimal into a readable percent value.
    $computedV = 100 * $maxRGB;

    // Special case if hueless (equal parts RGB make black, white, or grays)
    // Note that Hue is technically undefined when chroma is zero, as
    //   attempting to calculate it would cause division by zero (see
    //   below), so most applications simply substitute a Hue of zero.
    // Saturation will always be zero in this case, see below for details.
    if ($chroma == 0)
        return array(0, 0, $computedV);

    // Saturation is also simple to compute, and is simply the chroma
    //   over the Value (or Brightness)
    // Again, multiplied by 100 to get a percentage.
    $computedS = 100 * ($chroma / $maxRGB);

    // Calculate Hue component
    // Hue is calculated on the "chromacity plane", which is represented
    //   as a 2D hexagon, divided into six 60-degree sectors. We calculate
    //   the bisecting angle as a value 0 <= x < 6, that represents which
    //   portion of which sector the line falls on.
    if ($R == $minRGB)
        $h = 3 - (($G - $B) / $chroma);
    elseif ($B == $minRGB)
        $h = 1 - (($R - $G) / $chroma);
    else // $G == $minRGB
        $h = 5 - (($B - $R) / $chroma);

    // After we have the sector position, we multiply it by the size of
    //   each sector's arc (60 degrees) to obtain the angle in degrees.
    $computedH = 60 * $h;

    return array($computedH, $computedS, $computedV);
}


function HexHSL( $HexColor ){

        $HexColor    = str_replace( '#', '', $HexColor );

        if( strlen( $HexColor ) < 3 ) str_pad( $HexColor, 3 - strlen( $HexColor ), '0' );

        $Add         = strlen( $HexColor ) == 6 ? 2 : 1;
        $AA          = 0;
        $AddOn       = $Add == 1 ? ( $AA = 16 - 1 ) + 1 : 1;

        $Red         = round( ( hexdec( substr( $HexColor, 0, $Add ) ) * $AddOn + $AA ) / 255, 6 );
        $Green       = round( ( hexdec( substr( $HexColor, $Add, $Add ) ) * $AddOn + $AA ) / 255, 6 );
        $Blue        = round( ( hexdec( substr( $HexColor, ( $Add + $Add ) , $Add ) ) * $AddOn + $AA ) / 255, 6 );


        $HSLColor    = array( 'Hue' => 0, 'Saturation' => 0, 'Luminance' => 0 );

        $Minimum     = min( $Red, $Green, $Blue );
        $Maximum     = max( $Red, $Green, $Blue );

        $Chroma      = $Maximum - $Minimum;


        $HSLColor['Luminance'] = ( $Minimum + $Maximum ) / 2;

        if( $Chroma == 0 )
        {
                $HSLColor['Luminance'] = round( $HSLColor['Luminance'] * 255, 0 );

                return $HSLColor;
        }


        $Range = $Chroma * 6;


        $HSLColor['Saturation'] = $HSLColor['Luminance'] <= 0.5 ? $Chroma / ( $HSLColor['Luminance'] * 2 ) : $Chroma / ( 2 - ( $HSLColor['Luminance'] * 2 ) );

        if( $Red <= 0.004 || $Green <= 0.004 || $Blue <= 0.004 )
                $HSLColor['Saturation'] = 1;


        if( $Maximum == $Red )
        {
                $HSLColor['Hue'] = round( ( $Blue > $Green ? 1 - ( abs( $Green - $Blue ) / $Range ) : ( $Green - $Blue ) / $Range ) * 255, 0 );
        }
        else if( $Maximum == $Green )
        {
                $HSLColor['Hue'] = round( ( $Red > $Blue ? abs( 1 - ( 4 / 3 ) + ( abs ( $Blue - $Red ) / $Range ) ) : ( 1 / 3 ) + ( $Blue - $Red ) / $Range ) * 255, 0 );
        }
        else
        {
                $HSLColor['Hue'] = round( ( $Green < $Red ? 1 - 2 / 3 + abs( $Red - $Green ) / $Range : 2 / 3 + ( $Red - $Green ) / $Range ) * 255, 0 );
        }




        $HSLColor['Saturation'] = round( $HSLColor['Saturation'] * 255, 0 );
        $HSLColor['Luminance']  = round( $HSLColor['Luminance'] * 255, 0 );



        return $HSLColor;


}
















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
            //$id_type = $type['id'];
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
                                                                        $product["color_type"] = trim(strtolower($get_type[2]));
                                                                        $product_rgb = hex2rgb($product["color_type"]);
                                                                        $product["color_type_hsl"] = RGB_TO_HSV($product_rgb[0],$product_rgb[1],$product_rgb[2]);
                                                                        $product_hsl = RGB_TO_HSV($product_rgb[0],$product_rgb[1],$product_rgb[2]);
                                                                        $product["color_type_hsl_android"] = $product_hsl[0];
                                                                        
                                                                       





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