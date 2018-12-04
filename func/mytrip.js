//create a geocoder object to use the geocoder method
var geocoder = new google.maps.Geocoder();

$(function () {
    // fix the maps
    $("#edittripModal").on('shown.bs.modal', function () {
        google.maps.event.trigger(map, "resize");
    });

});

//calendar
//datepicker
// $(document).ready( function () {
//     $('#picker').dateTimePicker();
//     $('#picker2').dateTimePicker();
//     $('#picker-no-time').dateTimePicker({ showTime: false, dateFormat: 'DD/MM/YYYY'});
// });

$(".menu").click(function () {
    $(".navbar__list").toggle('speed');
});

$(".close").click(function () {
    $("#alert").hide();
});


//addTrip
var data;
var pickuppointLongitude;
var pickuppointLatitude;
var dropofpointLongitude;
var dropofpointLatitude, trip;

$("#addTripform").submit(function (event) {

    event.preventDefault();

    data = $(this).serializeArray();

    geocoding();

});

function geocoding() {

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

                getPickupDestinationCoordinates();

            } else {

                getPickupDestinationCoordinates();
            }

        });

}

//define function

//define geocoding function to get the address
function getPickupDestinationCoordinates() {

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

                // console.log(data);
                // getPickupCurrentLocationCoordinates();

                submitAddTripRequest();

            } else {
                // getPickupCurrentLocationCoordinates();
                submitAddTripRequest();
            }

        });

}


function submitAddTripRequest() {

    //send  AJAX call to addtrip.php
    $.ajax({
        url: "addTrip.php",
        type: "POST",
        data: data,
        success: function (returnedData) {

            // if (returnedData) {

                $('#addtripmessage').html(returnedData); 
                setTimeout(function(){
                    $("#addTripform")[0].reset();
                },3000);

                setTimeout(function(){
                    $('#addtripmessage').hide();
                },3000);

                setTimeout(function(){
                    getTripsRecents();
                },3000);

                // location.reload();

                // setTimeout(function(){
                //        //hide the modal
                // location.reload();

                // },100);
                
            // }else{
                 

               
            // }

        },
        error: function () {
            $("#addtripmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });
}


function getTripsRecents() {
    //send  AJAX call to gettrips.php
    $.ajax({
        url: "getTrip.php",
        success: function (returnedData) {
            // console.log(returnedData);
            if (returnedData) {

                $("#loadtrip").html(returnedData);

            } else {

                $("#loadtrip").html("<div class='alert alert-info'>Not trip created yet!.</div>");
            }

        },
        error: function () {

            $("#loadtrip").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });

}

//show the  trips
getTripsRecents();


//get payment riders history
function getRadersPayment() {
    //send  AJAX call to gettrips.php
    $.ajax({
        url: "statementRider.php",
        success: function (returnedData) {
            // console.log(returnedData);
            if (returnedData) {

                $("#paymentriders").html(returnedData);

            } else {

                $("#paymentriders").html("<div class='alert alert-info'>Not transaction created yet!.</div>");
            }

        },
        error: function () {

            $("#paymentriders").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });

}

//show payment riders history
getRadersPayment();


//show history trips
function getHistoryTrip(){
    //send  AJAX call to gethistorytrips.php
    $.ajax({
        url: "historytrip.php",
        success: function (returnedData) {
            // console.log(returnedData);
            if (returnedData) {

                $("#historytrip").html(returnedData);

            } else {

                $("#historytrip").html("<div class='alert alert-info'>Not trip created yet!.</div>");
            }

        },
        error: function () {

            $("#historytrip").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });
}
//show history trips
getHistoryTrip();

//get All trips//show all trips available for the current user

function getAllBookings(){
    //send  AJAX call to gethistorytrips.php
    $.ajax({
        url: "alltrips.php",
        success: function (returnedData) {
            // console.log(returnedData);
            if (returnedData) {

                $("#alltrip").html(returnedData);

            } else {

                $("#alltrip").html("<div class='alert alert-info'>Not trip created yet!.</div>");
            }

        },
        error: function () {

            $("#alltrip").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });
}

//show all trips
getAllBookings();

function geocodingEditTrip(){
    geocoder.geocode({
        'address': document.getElementById("pickuppoint2").value
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

            getPickupDestinationCoordinatesEditTrip();

        } else {

            getPickupDestinationCoordinatesEditTrip();
        }

    });
}

function getPickupDestinationCoordinatesEditTrip() {

    geocoder.geocode({
            'address': document.getElementById("dropofpoint2").value
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

                // console.log(data);

                submitEditTripRequest();

            } else {
                submitEditTripRequest();
            }

        });

}

function submitEditTripRequest() {

    //send  AJAX call to addtrip.php
    $.ajax({
        url: "updatetrip.php",
        type: "POST",
        data: data,
        success: function (data) {

            if (data) {

                $('#edittripmessage').html(data);

                setTimeout(function(){
                    $('#edittripmessage').hide();
                },3000);

                // reset form
                setTimeout(function(){
                    $('#Edittripform')[0].reset();
                },3000);

                //hide modal
                setTimeout(function(){
                    $('#edittripModal').modal('hide');
                },3000);

                setTimeout(function(){
                    location.reload();
                },3000);

                // //load trips
                
                // setTimeout(function(){
                //     getTripsRecents();
                // },3000);
                
                 
  
            }else{
                //hide modal
                $('#edittripModal').modal('hide');

                // reset form
                $('#Edittripform')[0].reset();

                //load trips
                getTripsRecents();

                setTimeout(function(){
                    location.reload();
                },3000);

            }

        },
        error: function () {
            $("#edittripmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });
}

//Edit form modal
function formatModal(){
    $("#pickuppoint2").val(trip['departure']);
    $("#dropofpoint2").val(trip['destination']);
    $("#distance2").val(trip['distance']);
    $("#duration2").val(trip['duration']);
    $("#amountofriders2").val(trip['amountofriders']);
    $("#nameofonerider2").val(trip['nameofonerider']);
    $("#price2").val(trip['price']);
    $("#result2").val(trip['date']);
    
       
}

$("#edittripModal").on('show.bs.modal',function(event){
    $("#edittripmessage").empty();
    var invoker = $(event.relatedTarget);
    // console.log(invoker);

    //ajax call to get details for the trip
    $.ajax({
        url: "detailsTrip.php",
        type: "POST",
        //we need to send the trip_id of the trip 
        data: {trip_id: invoker.data('trip_id')},
        success: function (data){ 
            if(data){

                if(data == 'error'){

                    $('#edittripmessage').text("There was an error with the Ajax Call. Please try again later.");

                }else{

                     //passe json data in array data
                    trip = JSON.parse(data);
                    //fill tedit trip form using the JSON parsed data
                    // console.log(trip);
                    formatModal();
                    
                }
            }
           
        },
        error: function(){
            $('#edittripmessage').text("There was an error with the Ajax Call. Please try again later.");

        }

    });

    //submit form for updating
    $("#Edittripform").submit(function(event){
        $("#edittripmessage").empty();
        event.preventDefault();
        data = $(this).serializeArray();
        data.push({name:'trip_id', value:invoker.data('trip_id')});
        geocodingEditTrip();
    });

    //delete a trip
    $("#deleteTrip").click(function(){
        //ajax call to get details for the trip
        $.ajax({
            url: "deletetrip.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {trip_id: invoker.data('trip_id')},
            success: function (returnedData){ 

                if(returnedData){

                    $('#edittripmessage').html("<div class='alert alert-danger'>The trip could not be deleted. Please try again!</div>");
                    
                }else{
                     //hide modal
                    setTimeout(function(){
                        $('#edittripModal').modal('hide');
                    },3000);

                    //load trips
                    
                    setTimeout(function(){
                        location.reload();
                    },3000);

                    setTimeout(function(){
                        getTripsRecents();
                    },3000);
                    setTimeout(function(){
                        getAllBookings();
                    },3000);
                    setTimeout(function(){
                        getHistoryTrip();
                    },3000);
                }
            
            },
            error: function(){
                $('#edittripmessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });
    });

});

//reload location when the modal closed
$('#edittripModal').on('hidden.bs.modal', function () {
    location.reload();
});

$("#paytripModal").on('show.bs.modal',function(event){
    $("#paytripmessage").empty();
    var invoker = $(event.relatedTarget);
    console.log(invoker);

    // ajax call to get details for the trip
    $.ajax({
        url: "getPricePayment.php",
        type: "POST",
        //we need to send the trip_id of the trip 
        data: {trip_id: invoker.data('trip_id')},
        success: function (data){ 
            if(data){

                if(data == 'error'){

                    $('#paytripmessage').text("There was an error with the Ajax Call. Please try again later.");

                }else{

                     //passe json data in array data
                    trip = JSON.parse(data);
                    //fill tedit trip form using the JSON parsed data
                    // console.log(trip);

                    $("#price3").val(trip['price']);
                    // formatModal();
                    
                }
            }
           
        },
        error: function(){
            $('#paytripmessage').text("There was an error with the Ajax Call. Please try again later.");

        }

    });

    //submit form for updating
    // $("#Edittripform").submit(function(event){
    //     $("#edittripmessage").empty();
    //     event.preventDefault();
    //     data = $(this).serializeArray();
    //     data.push({name:'trip_id', value:invoker.data('trip_id')});
    //     geocodingEditTrip();
    // });

});


// Add trip admin side

$("#addTripadminform").submit(function (event) {

    event.preventDefault();

    data = $(this).serializeArray();

    geocodingAdmin();

});

function geocodingAdmin() {

    geocoder.geocode({
            'address': document.getElementById("pickuppointadmin").value
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

                getPickupDestinationCoordinatesAdmin();

            } else {

                getPickupDestinationCoordinatesAdmin();
            }

        });

}

//define function

//define geocoding function to get the address
function getPickupDestinationCoordinatesAdmin() {

    geocoder.geocode({
            'address': document.getElementById("dropofpointadmin").value
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

                // console.log(data);
                // getPickupCurrentLocationCoordinates();

                submitAddTripRequestAdmin();

            } else {
                // getPickupCurrentLocationCoordinates();
                submitAddTripRequestAdmin();
            }

        });

}


function submitAddTripRequestAdmin() {

    //send  AJAX call to addtrip.php
    $.ajax({
        url: "addTripAdmin.php",
        type: "POST",
        data: data,
        success: function (returnedData) {

                $('#addtripadminmessage').html(returnedData); 
                setTimeout(function(){
                    $("#addTripadminform")[0].reset();
                },3000);

                setTimeout(function(){
                    $('#addtripadminmessage').hide();
                },3000);

                setTimeout(function(){
                    getTripsRecentsAvailableAdmin();
                },3000);

                setTimeout(function(){
                    location.reload();
                },3000);


        },
        error: function () {
            $("#addtripadminmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }
    });
}

function getTripsRecentsAvailableAdmin(){

}


$('#datetimepicker2').datetimepicker({
    locale: 'ru'
});
