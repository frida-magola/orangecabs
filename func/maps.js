//maps

var map, directionDisplay, marker1;
//set map options

var myLatLng = {
    lat: -26.204103,
    lng: 28.047304
}; //south africa

//maps zoom
var minZoom = 15;

var mapOptions = {
    center: myLatLng,
    zoom: minZoom,
    mapTypeId: google.maps.MapTypeId.SATELLITE
};

// Bounds for Johannesbourg
var strictBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(35.373482,-117.636879), 
    new google.maps.LatLng(-26.209970,28.025410)
  );


// //create an autocomplete object
var pickuppoint = document.getElementById('pickuppoint');
var dropofpoint = document.getElementById('dropofpoint');

var pickuppoint2 = document.getElementById('pickuppoint2');
var dropofpoint2 = document.getElementById('dropofpoint2');

var pickuppointadmin = document.getElementById('pickuppointadmin');
var dropofpointadmin = document.getElementById('dropofpointadmin');
// var currentlocation = document.getElementById('currentlocation');

var autocomplete1 = new google.maps.places.Autocomplete(pickuppoint);
autocomplete1.setFields(
    ['address_components', 'geometry', 'icon', 'name']);
var autocomplete2 = new google.maps.places.Autocomplete(dropofpoint);
autocomplete2.setFields(
    ['address_components', 'geometry', 'icon', 'name']);

var autocomplete3 = new google.maps.places.Autocomplete(pickuppoint2);
autocomplete3.setFields(
        ['address_components', 'geometry', 'icon', 'name']);
var autocomplete4 = new google.maps.places.Autocomplete(dropofpoint2);
autocomplete4.setFields(
        ['address_components', 'geometry', 'icon', 'name']);


var autocomplete5 = new google.maps.places.Autocomplete(pickuppointadmin);
autocomplete5.setFields(
        ['address_components', 'geometry', 'icon', 'name']);
var autocomplete6 = new google.maps.places.Autocomplete(dropofpointadmin);
autocomplete6.setFields(
        ['address_components', 'geometry', 'icon', 'name']);

// create a DirectionsService object to use the route method and get the result to 
// our request
var directionsService = new google.maps.DirectionsService();

//onload map add event
google.maps.event.addDomListener(window, 'load', initialize);

//initialise draw map in the map div
function initialize() {

    //create a directionsRenderer object which we will use to display the route
    directionDisplay = new google.maps.DirectionsRenderer();

    // create map
    map = new google.maps.Map(document.getElementById('map'),
        mapOptions);

    //     //settings mapTypeId upon construction
    map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

    //bind the directionsRenderer to the map
    directionDisplay.setMap(map);

    // //create maker1
    marker1 = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Johannesburg',
        draggable: true,
        animation: google.maps.Animation.DROP //ANIMATION
    });

}

//calculate route when selecting  autocomplete input
google.maps.event.addListener(autocomplete1, 'place_changed', calculateRoute);
google.maps.event.addListener(autocomplete2, 'place_changed', calculateRoute);

google.maps.event.addListener(autocomplete3, 'place_changed', calculateRouteEditTrip);
google.maps.event.addListener(autocomplete4, 'place_changed', calculateRouteEditTrip);

google.maps.event.addListener(autocomplete5, 'place_changed', calculateRouteAdmin);
google.maps.event.addListener(autocomplete6, 'place_changed', calculateRouteAdmin);

var duration; 
var minutes;
// define calculate route function

function calculateRoute() {

    var start = $("#pickuppoint").val();
    var end = $("#dropofpoint").val();

    //create a request send information to the API including the origine the 
    // our route and the destination the our route
    // and the travel mode

    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING,BYCYCLING,TRANSIT 
        unitSystem: google.maps.UnitSystem.METRIC //unitSystem: google.maps.UnitSystem.IMPERIAL

    };

    if (start && end) {

        //passe the request to the function call route method
        directionsService.route(request, function (result, status) {

            if (status == google.maps.DirectionsStatus.OK) {

                // console.log(result);
                //get distance and time
                $("#duration").val(result.routes[0].legs[0].duration.text);
                $("#distance").val(result.routes[0].legs[0].distance.text);


                var distance = result.routes[0].legs[0].distance.text;
                distance = distance.replace(',', '');
                distance = distance.replace('km', '');
                distance = parseInt(distance);
                
                //dist = parseInt(distance.substring(0, distance.lastIndexOf(' ')))

                //distance = distance.substring(0, distance.lastIndexOf(' '));
                // console.log(distance);

                //calculate price per kilometer R8.80/kilometer
                var price = distance * 8.50;
                price = price.toFixed(2);

                $("#price").val(price);


                // window.alert("The traveling distance is" + result.routes[0].legs[0].distance.text + ".<br> the traveling time is:" + result.routes[0].legs[0].duration.text + '.');

                // $("#messageOutput").html("<div class='alert-success'><p>From:  "
                // +document.getElementById("pickuppoint").value + ".</p> <p>To : " 
                // + document.getElementById("dropofpoint").value + ".</p> <p>Driving Distance: "
                // + result.routes[0].legs[0].distance.text + ".</p> <p>Duration : " 
                // + result.routes[0].legs[0].duration.text + ". </p></div>");
                //display the route using directionsRenderer
                directionDisplay.setDirections(result);

            } else {
                //delete the route from the map
                directionDisplay.setDirections({
                    routes: []
                });

                //center the map to south africa
                map.setCenter(myLatLng);

                //show alert message
                // $("#messageOutput").html("<div class='alert-danger'>Could not retrieve driving distance</div>");
            }

        });

    } else {

        //initialize the map
        initialize();

    }
}

function calculateRouteEditTrip() {

    var start = $("#pickuppoint2").val();
    var end = $("#dropofpoint2").val();

    //create a request send information to the API including the origine the 
    // our route and the destination the our route
    // and the travel mode

    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING,BYCYCLING,TRANSIT 
        unitSystem: google.maps.UnitSystem.METRIC //unitSystem: google.maps.UnitSystem.IMPERIAL

    };

    if (start && end) {

        //passe the request to the function call route method
        directionsService.route(request, function (result, status) {

            if (status == google.maps.DirectionsStatus.OK) {

                // console.log(result);
                //get distance and time
                $("#duration2").val(result.routes[0].legs[0].duration.text);
                $("#distance2").val(result.routes[0].legs[0].distance.text);


                var distance = result.routes[0].legs[0].distance.text;
                distance = distance.replace(',', '');
                distance = distance.replace('km', '');
                distance = parseInt(distance);

                //calculate price per kilometer R8.80/kilometer
                var price = distance * 8.50;
                price = price.toFixed(2);

                $("#price2").val(price);

                directionDisplay.setDirections(result);

            } else {
                //delete the route from the map
                directionDisplay.setDirections({
                    routes: []
                });

                //center the map to south africa
                map.setCenter(myLatLng);

            }

        });

    } else {

        //initialize the map
        initialize();

    }

}

// Calculate route admin side
function calculateRouteAdmin() {

    var start = $("#pickuppointadmin").val();
    var end = $("#dropofpointadmin").val();

    //create a request send information to the API including the origine the 
    // our route and the destination the our route
    // and the travel mode

    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING,BYCYCLING,TRANSIT 
        unitSystem: google.maps.UnitSystem.METRIC //unitSystem: google.maps.UnitSystem.IMPERIAL

    };

    if (start && end) {

        //passe the request to the function call route method
        directionsService.route(request, function (result, status) {

            if (status == google.maps.DirectionsStatus.OK) {

                // console.log(result);
                //get distance and time
                $("#durationadmin").val(result.routes[0].legs[0].duration.text);
                $("#distanceadmin").val(result.routes[0].legs[0].distance.text);


                var distance = result.routes[0].legs[0].distance.text;
                distance = distance.replace(',', '');
                distance = distance.replace('km', '');
                distance = parseInt(distance);
                
                //dist = parseInt(distance.substring(0, distance.lastIndexOf(' ')))

                //distance = distance.substring(0, distance.lastIndexOf(' '));
                // console.log(distance);

                //calculate price per kilometer R8.80/kilometer
                var price = distance * 8.50;
                price = price.toFixed(2);

                $("#priceadmin").val(price);

                directionDisplay.setDirections(result);

            } else {
                //delete the route from the map
                directionDisplay.setDirections({
                    routes: []
                });

                //center the map to south africa
                map.setCenter(myLatLng);

                //show alert message
                // $("#messageOutput").html("<div class='alert-danger'>Could not retrieve driving distance</div>");
            }

        });

    } else {

        //initialize the map
        initialize();

    }
}
