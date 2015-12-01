
// init var

var action_key;
var center_x = 48.855011; // todo from global php
var center_y = 2.346724; // todo from global php
var zoom = 12; // todo from global php
var map_legend_title = "Types"; // todo from global php
var map_legend_nota_bene = ""; // todo from global php


// get global var

var url = "map_globals.php"; 
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          // var response = xmlhttp.responseText;
          var response = JSON.parse(xmlhttp.responseText);

          // console.log(response);

          // console.log(response["CRUD_ACTION_KEY"]);

          // alert(response["CRUD_ACTION_KEY"]); //



          $.each(response,function(object){
            $.each(response[object],function(values){
              
              var LRDS_GOOGLEMAP_API_KEY = response[object][values].LRDS_GOOGLEMAP_API_KEY;

              var tableid = response[object][values].tableid;
              var center_x = response[object][values].center_x;
              var center_y = response[object][values].center_y;
              var zoom = response[object][values].zoom;
              var map_legend_title = response[object][values].map_legend_title;
              var map_legend_nota_bene = response[object][values].map_legend_nota_bene;
              var action_key = response[object][values].CRUD_ACTION_KEY;


/*              console.log(LRDS_GOOGLEMAP_API_KEY);
              console.log(tableid);
              console.log(center_x);
              console.log(center_y);
              console.log(zoom);
              console.log(map_legend_title);
              console.log(map_legend_nota_bene);
              console.log(action_key);*/



            });


          })










      }
};
xmlhttp.open("GET", url, true);
xmlhttp.send()











  // var tableid = 260197; // ???
  // var center = new google.maps.LatLng(48.824244, 2.335694);
  // var center_x = 48.855011; // todo from global php
  // var center_y = 2.346724; // todo from global php
  // var zoom = 12; // todo from global php
  // var map_legend_title = "Types"; // todo from global php
  // var map_legend_nota_bene = ""; // todo from global php
  // var map_legend_nota_bene = "* note";

  // var action_key="83abec5a494b89095d07e031445de903"; // for 'secure' POST // todo from global php

////////////////////////////////////////////////////////////////////////////////////






function Legend(controlDiv, map, types) {


    var legend = '';
    var arrayLength = types.length;
    for (var i = 0; i < arrayLength; i++) {
        var name = types[i][0];
        var color = types[i][1].substr(1);
        legend = legend + '<img src="http://www.googlemapsmarkers.com/v1/'+color+'" />&nbsp;'+name+'<br />';
    }





    // Set CSS styles for the DIV containing the control
    // Setting padding to 5 px will offset the control
    // from the edge of the map
    controlDiv.style.padding = '5px';

    // Set CSS for the control border
    var controlUI = document.createElement('DIV');
    controlUI.style.backgroundColor = 'white';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '1px';
    controlUI.title = 'Legend';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control text
    var controlText = document.createElement('DIV');
    controlText.style.fontFamily = 'Arial,sans-serif';
    controlText.style.fontSize = '12px';
    controlText.style.paddingLeft = '4px';
    controlText.style.paddingRight = '4px';
    
    // Add the text
    // http://www.googlemapsmarkers.com/ for styling icon
/*    controlText_Example.innerHTML = '<b>'+map_legend_title+'</b><br /><br />' +
      '<img src="http://www.googlemapsmarkers.com/v1/009900" />&nbsp;Nuit<br />' +
      '<img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png" /> Jour<br />' +
      '<img src="http://maps.google.com/mapfiles/ms/micons/green-dot.png" /> BabyFoot<br />' +
      '<img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png" /> Cassoulets<br />' +
      '<img src="http://maps.google.com/mapfiles/ms/micons/purple-dot.png" /> Pétanque<br />' +
      '<br /><small>'+map_legend_nota_bene+'</small>';*/

    controlText.innerHTML = '<b>'+map_legend_title+'</b><br /><br />' +
      // '<div id="id01"></div>' +
      legend +
      '<br /><small>'+map_legend_nota_bene+'</small>';

    controlUI.appendChild(controlText);

  }



  function initialize() {

    //var center_x = 48.855011;
    //var center_y = 2.346724;
    // var zoom = 12;
    // var action_key = "83abec5a494b89095d07e031445de903"; // todo from global php




    types = [];

      // var url = "map_legend.php";
      var url = "inc_mobile/CRUD_centres/get_all_types.php?action_key="+action_key; // todo action key from global php


    var xmlhttp = new XMLHttpRequest();


      xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var response = JSON.parse(xmlhttp.responseText);

        $.each(response,function(object){
            $.each(response[object],function(values){
              var tmp = []
/*              console.log(response[object][values].id)
              console.log(response[object][values].name)
              console.log(response[object][values].comments)
              console.log(response[object][values].color)*/

              tmp.push(response[object][values].name);
              tmp.push(response[object][values].color);
              types.push(tmp);


            });


          })



      }
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send()




//////////////////////////////////////////////////////////////////////////// GET MARKERS PRODUCTS

          var json = (function () { 
              // var json = null; 
              $.ajax({ 
                    type: 'post',
                     url: 'inc_mobile/CRUD_centres/get_all_centres.php',                  
                     data: "action_key="+action_key,                                       
                     dataType: 'json',                     
                     success: function(data){     
                      if(data){


                          var locations = [];

                          var json_array = JSON.stringify(data);

                          var jsonData = JSON.parse(json_array);
                          for (var i = 0; i < jsonData.centres.length; i++) {
                              list = [];
                              var counter = jsonData.centres[i];
                              list.push(counter.nom);
                              list.push(counter.localisation_x);
                              list.push(counter.localisation_y);
                              list.push(counter.name_type);
                              list.push(counter.color_type);
                              list.push("title");
                              locations.push(list);

                              //console.log(counter.nom);
                          }
                          locations.push(list);
                          // console.log(locations);



  ////////////////////////////////////////////////////////////////////////// CREATE MAP



    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: zoom,
      center: new google.maps.LatLng(center_x, center_y),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });




    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  

      try {color = locations[i][4].substr(1);}catch(err) {color='000000';}
      if (color) {} else{color='000000';}
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: 'http://www.googlemapsmarkers.com/v1/'+color
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }




    // Create the legend and display on the map
    var legendDiv = document.createElement('DIV');
    var legend = new Legend(legendDiv, map, types);
    legendDiv.index = 1;
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legendDiv);



                      }else{
                        alert("FALSE");
                        console.log("FALSE");
                      }        
                     } 
              });

              // return data;
              
          })();






}
