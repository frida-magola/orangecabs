//create a geocoder object to use the geocoder method
var geocoder = new google.maps.Geocoder();
var data;

//submit the search form
$("#searchform").submit(function(event){
    event.preventDefault();

    //collect all the input and place them in a variable data
    data = $(this).serializeArray();
    // console.log(data);
    geocodingSearch();
});

//define function
function geocodingSearch() {

    geocoder.geocode({
            'address': document.getElementById("pickuppoint").value
        },
        function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {

                // console.log(results);
                pickuppointLongitude = results[0].geometry.location.lng();
                pickuppointLatitude = results[0].geometry.location.lat();

                //add this to the data ajax
                data.push({
                    name: 'pickuppointLongitude',
                    value: pickuppointLongitude
                });
                data.push({
                    name: 'pickuppointLatitude',
                    value: pickuppointLatitude
                });

                // console.log(data);

                getSearchDestinationCoordinates();

            } else {

                getSearchDestinationCoordinates();
            }

        });

}

//define geocoding function to get the address
function getSearchDestinationCoordinates() {

    geocoder.geocode({
            'address': document.getElementById("dropofpoint").value
        },
        function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {

                // console.log(results);
                dropofpointLongitude = results[0].geometry.location.lng();
                dropofpointLatitude = results[0].geometry.location.lat();

                //add this to the data ajax
                data.push({
                    name: 'dropofpointLongitude',
                    value: dropofpointLongitude
                });
                data.push({
                    name: 'dropofpointLatitude',
                    value: dropofpointLatitude
                });

                submitSearchRequest();

            } else {

                submitSearchRequest();
            }

        });

}

function submitSearchRequest() {

    //send  AJAX call to addtrip.php
    $.ajax({
        url: "search.php",
        type: "POST",
        data: data,
        success: function (returnedData) {

            $("#searchResults").html(returnedData);

        },
        error: function () {
            $("#searchResults").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });
    // console.log(data);
}

//navbar mobile
$("#menus-toggle").click(function(){
    $("#sidebarmobile").toggle({
        // slider: 500
    })
    // alert('hi');
})
