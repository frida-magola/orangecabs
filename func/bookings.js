//maps training with island

    var myLatLng = {lat: -30.559483, lng: 22.937506}; //south africa
    var mapOptions =  {
        center: myLatLng,
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.SATELLITE
    };

    // create map
    var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);

    //settings mapTypeId upon construction
    map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

    //options marker1
    var marker1Options = {
        position: myLatLng,
        map: map,
        title: 'This is South Africa',
        draggable: true,
        animation: google.maps.Animation.DROP //ANIMATION

    };

    // //create maker1
   var marker1 = new google.maps.Marker(marker1Options);

//    //create a info window
//    var contentString = '<div class=""> This a infowindow</div>'
   
//    var infowindow = new google.maps.InfoWindow({
//        content: contentString,
//        maxWidth: 100

//    });

//    //add listener on marker to show the info window
//    marker1.addListener('click', function(){

//     infowindow.open(map, marker1);

//    });

//    //options marker2
//    var marker2Options = {

//         position: {lat: -33.924870, lng: 18.424055}, //cape towm
//         map: map,
//         title: 'This is Cape town',
//    }

//    //create marker 2
//    var marker2 = new google.maps.Marker(marker2Options);

//    //setAnimation marker2
//    marker2.setAnimation(google.maps.Animation.DROP);

//    //set marker2 on map
//    marker2.setMap(map);


// create a DirectionsService object to use the route method and get the result to 
// our request
var directionsService = new google.maps.DirectionsService();

 //create a directionsRenderer object which we will use to display the route
 var directionDisplay = new google.maps.DirectionsRenderer();

 //bind the directionsRenderer to the map
 directionDisplay.setMap(map);

// define calculate route function
function calculateRoute(){

    //create a request send information to the API including the origine the 
    // our route and the destination the our route
    // and the travel mode

    var request = {
        origin: document.getElementById("pickuppoint").value,
        destination: document.getElementById("dropofpoint").value,
        travelMode: google.maps.TravelMode.DRIVING,//WALKING,BYCYCLING,TRANSIT 
        unitSystem: google.maps.UnitSystem.IMPERIAL //unitSystem: google.maps.UnitSystem.METRIC

    };


     //passe the request to the function call route method
     directionsService.route(request, function(result, status){

        if(status == google.maps.DirectionsStatus.OK){

            // console.log(result);

            //get distance and time
            // window.alert("The traveling distance is" + result.routes[0].legs[0].distance.text + ".<br> the traveling time is:" + result.routes[0].legs[0].duration.text + '.');
            
            $("#messageOutput").html("<div class='alert-success'><p>From:  "
            +document.getElementById("pickuppoint").value + ".</p> <p>To : " 
            + document.getElementById("dropofpoint").value + ".</p> <p>Driving Distance: "
            + result.routes[0].legs[0].distance.text + ".</p> <p>Duration : " 
            + result.routes[0].legs[0].duration.text + ". </p></div>");
            //display the route using directionsRenderer
            directionDisplay.setDirections(result);

        }else{
            //delete the route from the map
            directionDisplay.setDirections({routes: []});

            //center the map to south africa
            map.setCenter(myLatLng);

            //show alert message
            $("#messageOutput").html("<div class='alert-danger'>Could not retrieve driving distance</div>");
        }

    });

}

//create a geocoder object to use the geocoder method
var geocoder = new google.maps.Geocoder();

//define geocoding function to get the address
function geocoding(){

    geocoder.geocode({'address': document.getElementById("pickuppoint").value}, 
    function(results, status){

        if(status == google.maps.GeocoderStatus.OK){

            console.log(results);

            window.alert('Address Coordinates:' + results[0].geometry.location);
            map.setCenter(results[0].geometry.location);

            var markergeocoder = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                // title: document.getElementById("pickuppoint").value,
                animation: google.maps.Animation.BOUNCE
            });

        }else{
            window.alert('the Geocoder is not successfull!' + status)
        }

    });
    
}

//define a variable of marker
var marker;

//define geocode function to get the post
function geocodeAddress(){

    var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+ document.getElementById("pickuppoint").value +"&key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs";

    // window.open(url);

    $.getJSON(url, function(data){
        
        if(data.status == "OK"){

            var formatedAddress = data.results[0].formatted_address;
            var latitude = data.results[0].geometry.location.lat;
            var longitude = data.results[0].geometry.location.lng;
            var postcode;

            $.each(data.results[0].address_components, function(index, element){

                if(element.types == "postal_code"){

                    postcode = element.long_name;

                    return false; // stop the loop

                }

            });

            $("#messageOutput").html("<b>Formatted Adress is:</b>" +formatedAddress+ 
            "<br> <b>Cordinates:</b> ( lat: " +latitude+ ", lng: " +longitude+ ". )<br> <b>Post Code </b>: " +postcode + ".");

            //center the location on the maps
            map.setCenter({lat: latitude, lng: longitude});

            //change the zoom level

            map.setZoom(14);

            //if marker is there delete it
            if(marker != undefined){
                marker.setMap(null);

            }
            //create a marker
            marker = new google.maps.Marker({
                position: {lat: latitude, lng: longitude},
                map: map,
                animation: google.maps.Animation.DROP
            });


        }else{

            $("#messageOutput").html("Request Unsuccessfull");
        }
    });
}

var calcRouteBtn = document.getElementById('calculateRoute');
var geocodingAddress = document.getElementById('geocodingAddress');

calcRouteBtn.addEventListener('click', function(){
    calculateRoute();
});

geocodingAddress.addEventListener('click', function(){
    // geocoding();
    geocodeAddress();

});

//NEAR BY SEARCH
// 1. define a request the location must be defined using google.maps.LatLng

var southafrica = new google.maps.LatLng(-30.559483,22.937506); 

var request = {
    location: southafrica,
    radius: '150',
    types: ['store']
};

//create a placeService object before using the nearbysearch method
var service = new google.maps.places.PlacesService(map);

service.nearbySearch(request, callback); //return an array

//define the callback function showing what we do with the results
function callback(result, status){

    if(status == google.maps.places.PlacesServiceStatus.OK){
        console.log(result);

        for(i = 0; i < result.length; i++){

            // addMarker(result[i]);

        }
    }

}

//function add marker for each places in the result arrray
// function addMarker(place){

//     var marker = new google.maps.Marker({
//         map:map,
//         position: place.geometry.location,
//         animation: google.maps.Animation.DROP
//     });

//     google.maps.event.addListener(marker, "click", function(){
//         infowindow.setContent(place.name);
//         infowindow.open(map, this);
//     })

// }

//create an autocomplete object

var pickuppoint = document.getElementById('pickuppoint');
var dropofpoint = document.getElementById('dropofpoint');
var options = {
    types: ['(cities)'],
}

var autocomplete1 = new google.maps.places.Autocomplete(pickuppoint, options);
autocomplete1.addListener('place_changed', onPlaceChanged);

function onPlaceChanged(){

    var place = autocomplete1.getPlace();
    map.panTo(place.geometry.location);
}

var autocomplete2 = new google.maps.places.Autocomplete(dropofpoint, options);



