
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href = "http://localhost:8887/wn/wp-content/themes/mwn/cust_style.css" rel = "stylesheet" type = "text/css"/>

        <style>
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .controls {
                margin-top: 10px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }

            #pac-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 300px;
            }

            #pac-input:focus {
                border-color: #4d90fe;
            }

            .pac-container {
                font-family: Roboto;
            }

            #type-selector {
                color: #fff;
                background-color: #4d90fe;
                padding: 5px 11px 0px 11px;
            }

            #type-selector label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
            }

        </style>
    </head>
    <body>
        <div class="container">

            <div class="row"><div class="col-lg-6 alert alert-info">Google Map autocomplete Example</div></div>
            
            <div class="row">
                <form method="post" action="">
                    <div class="col col-lg-6">
                        Name
                        <input type="text" name="name" class="form-control">
                        <br>
                        <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                        <div id="type-selector" class="controls">
                        <label for="automatic-location">Use current location</label>
                        <input type="radio" name="type" id="automatic-location" checked="checked" onclick = "initMap()">
                        <label for="manual-location">Type location</label>
                        <input type="radio" name="type" id="manual-location" onclick = "initMap()" >
                        </div>
                        <div id="map" style="height: 300px;width: 540px"></div>
                        <br>
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                        <input type="hidden" name="location" id="location">
                        <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
                    </div>
                </form>
            </div><!--End of row-->
            <div id="vets">

            </div>
        </div><!--End of conatiner-->
        
        <script>

            function add_marker_info(marker,each_content){

                var infoWindow = new google.maps.InfoWindow({
                        content : each_content
                    });
                marker.addListener('click', function() {
                    infoWindow.open(marker.get('map'), marker);
                    map.setCenter(marker.getPosition());
                });



            }

            function add_markers(all_markers,map){
                for (var i = 0, each_marker; each_marker = all_markers[i]; i++) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: each_marker.geometry.location
                    }); 
                    add_marker_info(marker,each_marker['name'])
                }   

                
            }


            function create_vet(all_vets){
                var div_vets = document.getElementById("vets");
                div_vets.innerHTML = "";

                for (var i = 0, each_vet; each_vet = all_vets[i]; i++) {
                    var div_vet = document.createElement("div");
                    div_vet.id += "each_vet";


                    var vet_image = document.createElement("img");
                    vet_image.className += "vet_image";
                    div_vet.appendChild(vet_image);


                    var vet_header = document.createElement("h4");
                    var header_content = document.createTextNode(all_vets[i]['name']);
                    vet_header.className += "vet_title";
                    vet_header.appendChild(header_content);  
                    div_vet.appendChild(vet_header);
    

                    var vet_address = document.createElement("p")
                    var address_content = document.createTextNode(all_vets[i]['vicinity']); 
                    vet_address.appendChild(address_content);
                    div_vet.appendChild(address_content);
                    div_vets.appendChild(div_vet)

                } 

                



            }
            function find_vets(coords,map){
                var request = {
                    location: coords,
                    radius:5000,
                    type: 'veterinary_care',
                };
                service = new google.maps.places.PlacesService(map);
                console.log()
                service.nearbySearch(request, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    
                    create_vet(results);
                    add_markers(results,map)

                }
 


                

                });
            }




            

            function initMap() {
                var types = document.getElementById('type-selector');
                var input = /** @type {!HTMLInputElement} */( document.getElementById('pac-input'));
                var infoWindow = new google.maps.InfoWindow;
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                    lat: -33.8688, lng: 151.2195},
                    zoom: 13
                });

                if (navigator.geolocation && document.getElementById('automatic-location').checked ) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        vets_list = find_vets(pos,map)
                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        infoWindow.open(map);
                        map.setCenter(pos);}, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                        
                    });
                }else{

                    var options = {
                        componentRestrictions: {country: 'au'}
                    };

                    var autocomplete = new google.maps.places.Autocomplete(input,options);

                    
                    var marker = new google.maps.Marker({
                        map: map,
                        anchorPoint: new google.maps.Point(0, -29)
                    });

                    autocomplete.addListener('place_changed', function() {
                        infoWindow.close();
                        marker.setVisible(false);
                        var place = autocomplete.getPlace();

                        if (!place.geometry) {
                            // User entered the name of a Place that was not suggested and
                            // pressed the Enter key, or the Place Details request failed.
                            window.alert("No details available for input: '" + place.name + "'");
                            return;
                        }

                        // If the place has a geometry, then present it on a map.
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);  // Why 17? Because it looks good.
                        }

                        marker.setIcon(/** @type {google.maps.Icon} */({
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(35, 35)
                        }));
                        
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);
                        var item_Lat = place.geometry.location.lat()
                        var item_Lng = place.geometry.location.lng()
                        var item_Location = place.formatted_address;
                        //alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
                        $("#lat").val(item_Lat);
                        $("#lng").val(item_Lng);
                        $("#location").val(item_Location);
                        var address = '';
                        if (place.address_components) {
                            address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                            ].join(' ');
                        }
                        var pos = {
                            lat: place.geometry.location.lat(),
                            lng: place.geometry.location.lng()
                        };

                        vets_list = find_vets(pos,map)

                        infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                        infoWindow.open(map, marker);
                    });

                }





            }





        </script>


        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVOUpVdG_A3D-fF4-BgUENrqlQgYJNMY8&libraries=places"></script>

    
    </body>
    
</html>

<?php
/*
Template Name: new
*/

?>

