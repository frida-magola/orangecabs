//update picture car preview
var file, imageType,imageName,imageSize;
var wrongType,data;
var user;
var body;
var img = document.createElement("img");
var data;

var bodydriver;
var img2 = document.createElement("img");

var bodydriveredit;
var img3 = document.createElement("img");

var carbody;
var img4= document.createElement("img");

var userbody;
var img5= document.createElement("img");

// add model car type
$("#addmodelcarform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "addmodelcar.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#addmodelcarmessage").html(data);
                // //hide modal
                
                setTimeout(function(){
                    $("#addmodelcarform")[0].reset();
                },3000);

                setTimeout(function(){
                    $("#addmodelcarmessage").hide();
                },3000);

            }
        },
        error: function(){
            $("#addmodelcarmessage").html("<div class='red' style='color:#fff;'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//Delete cars
$("#deleteCarForm").submit(function(event) {
    event.preventDefault();
    data = $(this).serializeArray();
    // console.log(data);
    $.ajax({
        url: 'funcadmin/deletecars.php',
        method: 'POST',
        data: data,
        success: function(data){

            if(data){

                window.alert("<div class='alert alert-danger'>The trip could not be deleted. Please try again!</div>");
            
            }else{

                setTimeout(function(){
                    location.reload();
                },3000);

            }

        },
        error: function(){
            window.alert("<p>There was an error with the Ajax Call. Please try again later.</p>")
        }
    });
    
});

//picture driver
$("#picturedriver").change(function(){

    file = this.files[0];
    // console.log(file);
    imageType = file.type;
    imageSize = file.size;
    imageName = file.name;

    //check image type
    var acceptableType = ["image/jpeg", "image/png", "image/jpg"];

    wrongType = ($.inArray(imageType,acceptableType) == -1);

    if(wrongType){

        $("#adddrivermessage").html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

        return false;
    }

    //check image size is super 3 mega byte(Mo)
    if(imageSize > 3*1024*1024){

        $("#adddrivermessage").html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

        return false;
    }

    //fileReader object will be used to convert the image in a binary string
    var reader = new FileReader();

    //callback 
    reader.onload = updatePreviewPicturedriveradd;

    //start read operation = convert content into a data url
    reader.readAsDataURL(file);

});

// updatePreviewPicture function
function updatePreviewPicturedriveradd(event){
    // console.log(event);
    $("#imagePreviewdriveradd").attr("src", event.target.result);
}

//Ajax Call for the add driver form
//Once the form is submitted
$("#adddriverform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    // var datatopost = $(this).serializeArray();
//    console.log(datatopost);

    //  //file missing
    if(!file){

        $("#adddrivermessage")
        .html("<div class='alert alert-danger'>Please upload a picture !.</div>");

        return false;

    }

    //check if image type is wrong
    if(wrongType){

        $("#adddrivermessage")
        .html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

        return false;
    }

    //check if image is to big
    if(imageSize > 3*1024*1024){

        $("#adddrivermessage")
        .html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

        return false;
    }

    //send them to login.php using AJAX
    $.ajax({
        url: "adddriver.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
                cache: false,
        processData:false,
        success: function(data){

            if(data){
                $("#adddrivermessage").html(data);

                setTimeout(function(){
                    $("#adddriverform")[0].reset();
                },3000);

                setTimeout(function(){
                    $("#adddrivermessage").hide();
                },3000);

                // setTimeout(function(){
                //     $("#adddrivermessage")[0].reset();
                // },3000);
            }

        },
        error: function(){
            $("#adddrivermessage").html("<div class='red' style='color:#fff;'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }   
    });
});

$("#picturecar").change(function(){

    file = this.files[0];
    // console.log(file);
    imageType = file.type;
    imageSize = file.size;
    imageName = file.name;

    //check image type
    var acceptableType = ["image/jpeg", "image/png", "image/jpg"];

    wrongType = ($.inArray(imageType,acceptableType) == -1);

    if(wrongType){

        $("#addcarsResult").html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

        return false;
    }

    //check image size is super 3 mega byte(Mo)
    if(imageSize > 3*1024*1024){

        $("#addcarsResult").html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

        return false;
    }

    //fileReader object will be used to convert the image in a binary string
    var reader = new FileReader();

    //callback 
    reader.onload = updatePreviewPicture;

    //start read operation = convert content into a data url
    reader.readAsDataURL(file);

});

// updatePreviewPicture function
function updatePreviewPicture(event){
    // console.log(event);
    $("#imagePreview").attr("src", event.target.result);
}

//Ajax Call for the add car form 
//Once the form is submitted
$("#addcarsform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();

    //  //file missing
     if(!file){

        $("#addcarsResult")
        .html("<div class='alert alert-danger'>Please upload a picture !.</div>");

        return false;

    }

    //check if image type is wrong
    if(wrongType){

        $("#addcarsResult")
        .html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

        return false;
    }

    //check if image is to big
    if(imageSize > 3*1024*1024){

        $("#addcarsResult")
        .html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

        return false;
    }

    //console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "addcars.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
                cache: false,
        processData:false,
        success: function(data){
            if(data){
                $("#addcarsResult").html(data);
                // //hide modal
                
                setTimeout(function(){
                    $("#addcarsform")[0].reset();
                },3000);

                setTimeout(function(){
                    $("#addcarsResult").hide();
                },3000);

                setTimeout(function(){
                    location.reload();
                },3000);

                // setTimeout(function(){
                //     allcars();
                // },3000);

                // allcars();

                // setTimeout(function(){
                //     $("#cars-modal").hide();
                // },3000);
            }
        },
        error: function(){
            $("#addcarsResult").html("<div class='red' style='color:#fff;'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

// //upload file 
$("#profilepictureform").submit(function(){
    //prevent default php file
    event.preventDefault();

    //file missing
    if(!file){

        $("#updatepicturemessage")
        .html("<div class='alert alert-danger'>Please upload a picture !.</div>");

        return false;

    }

    //check if image type is wrong
    if(wrongType){

        $("#updatepicturemessage")
        .html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

        return false;
    }

    //check if image is to big
    if(imageSize > 3*1024*1024){

        $("#updatepicturemessage")
        .html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

        return false;
    }

    //show file uploaded in the console
    // var test = new FormData(this);
    // console.log(test.get("picture"));

    //call ajax
    $.ajax({
        url:"updatepicture.php",
        method: "POST",
        data: new FormData(this),
        contentType: false, // contentType:" application/json ; charset=utf-8",
        cache: false,
        processData: false,
        success: function(data){

            if(data){

                $("#updatepicturemessage")
                .html(data);

                setTimeout(function(){
                    $("#profilepictureform")[0].reset();
                },3000);

                setTimeout(function(){
                    $("#updatepicturemessage").hide();
                },3000);

            }else{
                
                location.reload();
            }

        },
        error: function(){

            $("#class='alert alert-danger'")
            .html("<div class='red' style='color:#fff;'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});

  //dataTable
  $("#datatable").dataTable({});


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

    // more information for the user
    function formatuserInfo(){
        
        $("#userinfo ul .username").append(user['username']);
        $("#userinfo ul .mobile").append(user['mobile']);
        $("#userinfo ul .email").append(user['email']);
        $("#userinfo ul .date").append(user['date_registration']);

        if(user['profilepicture'] !==''){
            img.src = user['profilepicture'];  
            body = document.getElementById('pictureuser');  // use element where you want to display image
            body.appendChild(img);

        }else{
            img.src = 'profilepicture/useravater.png';
            body = document.getElementById('pictureuser');  // use element where you want to display image
            body.appendChild(img);
        }

        if(user['verify'] == '0'){
            $("#userinfo ul .status").append('Pending');
        }else {
            $("#userinfo ul .status").append('Active');
        }
        
    }

    $("#infouser").on('show.bs.modal',function(event){

        $("#userinfoMessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "inforUser.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {user_id: invoker.data('user_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#userinfoMessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        user = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        // console.log(user);
                        formatuserInfo();
                        
                        
                    }
                }
            
            },
            error: function(){
                $('#infoMessageUser').text("There was an error with the Ajax Call. Please try again later.");

            }

        });



    });

    //reload location when the modal closed
    $('#infouser').on('hidden.bs.modal', function () {
        location.reload();
    });


    // info driver 
    function formatdriverInfo(){
            
        $("#driverinfo ul .driverusername").append(user['username']);
        $("#driverinfo ul .mobile").append(user['mobile']);
        $("#driverinfo ul .email").append(user['email']);
        
        $("#driverinfo ul .date").append(user['date_registration']);

        if(user['profilepicture'] !==''){
            img2.src = user['profilepicture'];  
            bodydriver = document.getElementById('picturedriverinfo');  // use element where you want to display image
            bodydriver.appendChild(img2);

        }else{
            img2.src = 'profilepicture/useravater.png';
            bodydriver = document.getElementById('picturedriverinfo');  // use element where you want to display image
            bodydriver.appendChild(img2);
        }

        if(user['verify'] == '0'){
            $("#driverinfo ul .status").append('Pending');
        }else {
            $("#driverinfo ul .status").append('Active');
        }

        if(user['role'] == '2'){
            $("#driverinfo ul .role").append('driver');
        }else{
            $("#driverinfo ul .role").append(user['role']);
        }
        
    }

    $("#infodriver").on('show.bs.modal',function(event){

        $("#driverinfoMessage").empty();
        var invoker = $(event.relatedTarget);
        console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "infoDriver.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {user_id: invoker.data('user_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#driverinfoMessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        user = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        console.log(user);
                        formatdriverInfo();
                        
                        
                    }
                }
            
            },
            error: function(){
                $('#driverinfoMessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });



    });

    //reload location when the modal closed
    $('#infodriver').on('hidden.bs.modal', function () {
        location.reload();
    });

    // Cars more information
    function formatcarInfo(){
        
            $("#carinfo ul .carmodel").append(car['model_type']);
            $("#carinfo ul .carbrand").append(car['brand_car']);
            $("#carinfo ul .seatavailable").append(car['seatavailable']);
            $("#carinfo ul .rateperkm").append(car['rate_per_km']);
            $("#carinfo ul .driver").append(car['username']);
            $("#carinfo ul .statuscar").append(car['status_car']);
            $("#carinfo ul .colorcar").append(car['color']);
            $("#carinfo ul .carregistration").append(car['vehicule_registration']);
            $("#carinfo ul .carlicencen").append(car['vehicule_licenceN']);
            $("#carinfo ul .date").append(car['date_add']);
    
            if(car['picture'] !==''){
                img4.src = car['picture'];  
                carbody = document.getElementById('morepicturecarinfo');  // use element where you want to display image
                carbody.appendChild(img4);
    
            }else{
                img4.src = 'profilepicture/carprofile.png';
                carbody = document.getElementById('morepicturecarinfo');  // use element where you want to display image
                carbody.appendChild(img4);
            }

            //photo driver
            // if(car['profilepicture'] !==''){
            //     imgcar.src = car['profilepicture'];  
            //     carbody = document.getElementById('picturecarinfo');  // use element where you want to display image
            //     body.appendChild(img);
    
            // }else{
            //     img.src = 'profilepicture/carprofile.png';
            //     body = document.getElementById('picturecarinfo');  // use element where you want to display image
            //     body.appendChild(img);
            // }
            
    }
    
    $("#infocars").on('show.bs.modal',function(event){
    
            $("#carinfoMessage").empty();
            var invoker = $(event.relatedTarget);
            console.log(invoker);
    
            //ajax call to get details for the trip
            $.ajax({
                url: "infoCars.php",
                type: "POST",
                //we need to send the trip_id of the trip 
                data: {car_id: invoker.data('car_id')},
                success: function (data){ 
                    if(data){
    
                        if(data == 'error'){
    
                            $('#carinfoMessage').text("There was an error with the Ajax Call. Please try again later.");
    
                        }else{
    
                            //passe json data in array data
                            car = JSON.parse(data);
                            //fill tedit trip form using the JSON parsed data
                            // console.log(car);
                            formatcarInfo();
                            
                            
                        }
                    }
                
                },
                error: function(){
                    $('#carinfoMessage').text("There was an error with the Ajax Call. Please try again later.");
    
                }
    
            });
    
    
    
    });
    
    //reload location when the modal closed
    $('#infocars').on('hidden.bs.modal', function () {
        location.reload();
    });


    // Cars more info request bookings information
    function formatrequestbookingsInfo(){
                                        // $date = date('D d M, Y h:i', strtotime($row['date']));
        
            $("#requestbookingsinfo table .pickuppoint").append(car['departure']);
            $("#requestbookingsinfo table .dropofpoint").append(car['destination']);
            $("#requestbookingsinfo table .distance").append(car['distance']);
            $("#requestbookingsinfo table .duration").append(car['duration']);
            $("#requestbookingsinfo table .price").append(car['price']);
            $("#requestbookingsinfo table .amountofrider").append(car['amountofriders']);
            $("#requestbookingsinfo table .nameofonerider").append(car['nameofonerider']);
            $("#requestbookingsinfo table .statuspayment").append(car['status_pay']);
            $("#requestbookingsinfo table .date").append(car['date']);
            
    }
    
    $("#inforequestbookings").on('show.bs.modal',function(event){
    
            $("#requestbookingsinfoMessage").empty();
            var invoker = $(event.relatedTarget);
            console.log(invoker);
    
            //ajax call to get details for the trip
            $.ajax({
                url: "infoRequestBookings.php",
                type: "POST",
                //we need to send the trip_id of the trip 
                data: {trip_id: invoker.data('trip_id')},
                success: function (data){ 
                    if(data){
    
                        if(data == 'error'){
    
                            $('#requestbookingsinfoMessage').text("There was an error with the Ajax Call. Please try again later.");
    
                        }else{
    
                            //passe json data in array data
                            car = JSON.parse(data);
                            //fill tedit trip form using the JSON parsed data
                            // console.log(car);
                            formatrequestbookingsInfo();
                            
                            
                        }
                    }
                
                },
                error: function(){
                    $('#requestbookingsinfoMessage').text("There was an error with the Ajax Call. Please try again later.");
    
                }
    
            });
    
    
    
    });
    
    //reload location when the modal closed
    $('#inforequestbookings').on('hidden.bs.modal', function () {
        location.reload();
    });

    //get all request riders
    function allrequestBookings() {
        //send  AJAX call to gettrips.php
        $.ajax({
            url: "alltriprequest.php",
            success: function (returnedData) {
                // console.log(returnedData);
                if (returnedData) {

                    $("#allrequestbookings").html(returnedData);

                } else {

                    $("#allrequestbookings").html("<div class='alert alert-info'>Not request bookings available yet!.</div>");
                }

            },
            error: function () {

                $("#allrequestbookings").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

            }
        });


    }

    //Edit or update driver form modal
    function formateditdriverModal(){
        $("#driverusername2").val(user['username']);
        $("#mobile2").val(user['mobile']);
        $("#email2").val(user['email']);
            
    }

    //Update picture driver;
    $("#picturedriver2").change(function(){

        file = this.files[0];
        // console.log(file);
        imageType = file.type;
        imageSize = file.size;
        imageName = file.name;

        //check image type
        var acceptableType = ["image/jpeg", "image/png", "image/jpg"];

        wrongType = ($.inArray(imageType,acceptableType) == -1);

        if(wrongType){

            $("#updatepicturedrivermessage").html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

            return false;
        }

        //check image size is super 3 mega byte(Mo)
        if(imageSize > 3*1024*1024){

            $("#updatepicturedrivermessage").html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

            return false;
        }

        //fileReader object will be used to convert the image in a binary string
        var reader = new FileReader();

        //callback 
        reader.onload = updatePreviewPicturedriver;

        //start read operation = convert content into a data url
        reader.readAsDataURL(file);

    });

    // updatePreviewPicture driver function
    function updatePreviewPicturedriver(event){
        // console.log(event);
        $("#imagePreviewdriver2").attr("src", event.target.result);
    }

    // Send data to php file via ajax, upload file 
    $("#updateDriverPictureModal").on('show.bs.modal',function(event){
        $("#updatepicturedrivermessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        $("#updateDriverPictureForm").submit(function(event){
            //prevent default php file
            event.preventDefault();
            data = new FormData(this);
            // data.push(new FormData(this));
            data.push({name:'user_id', value:invoker.data('user_id')});
            // console.log(data);
        
            //file missing
            if(!file){
        
                $("#updatepicturedrivermessage")
                .html("<div class='alert alert-danger'>Please upload a picture !.</div>");
        
                return false;
        
            }
        
            //check if image type is wrong
            if(wrongType){
        
                $("#updatepicturedrivermessage")
                .html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");
        
                return false;
            }
        
            //check if image is to big
            if(imageSize > 3*1024*1024){
        
                $("#updatepicturedrivermessage")
                .html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");
        
                return false;
            }
        
            //show file uploaded in the console
            // var test = new FormData(this);
            // console.log(test.get("picture"));
        
            //call ajax
            $.ajax({
                url:"updatepictureDriver.php",
                method: "POST",
                data: data,
                contentType: false, // contentType:" application/json ; charset=utf-8",
                cache: false,
                processData: false,
                success: function(data){
        
                    if(data){
        
                        $("#updatepicturedrivermessage")
                        .html(data);
        
                        setTimeout(function(){
                            $("#updatepicturedrivermessage")[0].reset();
                        },3000);
        
                        setTimeout(function(){
                            $("#updatepicturedrivermessage").hide();
                        },3000);
        
                    }else{
                        
                        location.reload();
                    }
        
                },
                error: function(){
        
                    $("#updatepicturedrivermessage")
                    .html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                }
            });
        });

    });


    // edit or update  driver
    $("#editdriverModal").on('show.bs.modal',function(event){
        $("#editdrivermessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "infoDriver.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {user_id: invoker.data('user_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#editdrivermessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        user = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        // console.log(trip);
                        formateditdriverModal();
                        
                    }
                }
            
            },
            error: function(){
                $('#editdrivermessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });

        //submit form for updating
        $("#editdriverform").submit(function(event){
            $("#editdrivermessage").empty();
            event.preventDefault();
            data = $(this).serializeArray();
            // data.push(new FormData(this));
            data.push({name:'user_id', value:invoker.data('user_id')});

            $.ajax({
                url: "updateDriver.php",
                type: "POST",
                //we need to send the trip_id of the trip 
                data: data,
                success: function (returnedData){ 

                    if(returnedData){

                        $('#editdrivermessage').html(returnedData);
                        //hide modal
                        setTimeout(function(){
                            $('#editdrivermessage').hide();
                            location.reload();
                        },3000);

                        setTimeout(function(){
                            location.reload();
                        },3000);

                    }else{
                        //hide modal
                        setTimeout(function(){
                            // $('#editdriverModal').modal('hide');
                            location.reload();
                        },3000);

                    }
                
                },
                error: function(){
                    $('#editdrivermessage').text("There was an error with the Ajax Call. Please try again later.");

                }

            });
    
        });

    });

    //delete form modal
    function formatdeletedriverModal(){
        $("#driverusername3").val(user['username']);
        $("#mobile3").val(user['mobile']);
        $("#email3").val(user['email']);
        
        

        if(user['profilepicture'] !==''){
            img3.src = user['profilepicture'];  
            bodydriver3 = document.getElementById('imagePreviewdriver3');  // use element where you want to display image
            bodydriver3.appendChild(img3);

        }else{
            img3.src = 'profilepicture/carprofile.png';
            bodydriver3 = document.getElementById('imagePreviewdriver3');  // use element where you want to display image
            bodydriver3.appendChild(img3);
        }
            
    }

    // delete driver
    $("#deletedriverModal").on('show.bs.modal',function(event){
        $("#deletedrivermessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "infoDriver.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {user_id: invoker.data('user_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#deletedrivermessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        user = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        // console.log(trip);
                        formatdeletedriverModal();
                        
                    }
                }
            
            },
            error: function(){
                $('#deletedrivermessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });

        //delete a trip
        $("#deletedriver").click(function(){
            //ajax call to get details for the trip
            $.ajax({
                url: "deletedriver.php",
                type: "POST",
                //we need to send the trip_id of the trip 
                data: {user_id: invoker.data('user_id')},
                success: function (returnedData){ 

                    if(returnedData){

                        $('#deletedrivermessage').html("There was an error with the Ajax Call. Please try again later.");
                        

                    }else{
                        //hide modal
                        setTimeout(function(){
                            // $('#editdriverModal').modal('hide');
                            location.reload();
                        },3000);
                    }
                
                },
                error: function(){
                    $('#deletedrivermessage').text("There was an error with the Ajax Call. Please try again later.");

                }

            });
        });

    });


    // More info car delete form modal
    function formatdeletecarInfo(){
            
        $("#vehiculemodeldelete").val(car['model_type']);
        // $("#carinfo ul .carbrand").val(car['brand_car']);
        $("#seatavailabledelete").val(car['seatavailable']);
        $("#rateperkmdelete").val(car['rate_per_km']);
        $("#driverdelete").val(car['username']);
        $("#vehiculeRegistrationNdelete").val(car['vehicule_registration']);
        $("#LicenceNumdelete").val(car['vehicule_licenceN']);

        if(car['picture'] !==''){
            img4.src = car['picture'];  
            carbody = document.getElementById('morepicturecarinfo');  // use element where you want to display image
            carbody.appendChild(img4);

        }else{
            img4.src = 'profilepicture/carprofile.png';
            carbody = document.getElementById('morepicturecarinfo');  // use element where you want to display image
            carbody.appendChild(img4);
        }
        
    }
    //Delete car
    $("#deletecarsModal").on('show.bs.modal',function(event){
        $("#deletecarsmessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "infoCars.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {car_id: invoker.data('car_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#deletecarsmessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        car = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        // console.log(trip);
                        formatdeletecarInfo();
                        
                    }
                }
            
            },
            error: function(){
                $('#deletedrivermessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });

        //delete a car
        $("#deletecar").click(function(){
            //ajax call to get details for the car
            $.ajax({
                url: "deletecars.php",
                type: "POST",
                //we need to send the trip_id of the car 
                data: {car_id: invoker.data('car_id')},
                success: function (returnedData){ 

                    if(returnedData){

                        $('#deletecarsmessage').html("There was an error with the Ajax Call. Please try again later.");
                        

                    }else{
                        //hide modal
                        setTimeout(function(){
                            // $('#editdriverModal').modal('hide');
                            location.reload();
                        },3000);
                    }
                
                },
                error: function(){
                    $('#deletecarsmessage').text("There was an error with the Ajax Call. Please try again later.");

                }

            });
        });

    });

    //More info update form modal
    function formatupdatecarInfo(){
            //var optionValue = $(this).val();
            //var optionText = $('#dropdownList option[value="'+optionValue+'"]').text();
        $("#vehiculemodelupdate").val(car['model_type']);
        // $("#carinfo ul .carbrand").val(car['brand_car']);
        $("#seatavailableupdate").val(car['seatavailable']);
        $("#rateperkmupdate").val(car['rate_per_km']);
        $("#driverupdate option:selected").val(car['username']);
        $("#vehiculeRegistrationNupdate").val(car['vehicule_registration']);
        $("#LicenceNumupdate").val(car['vehicule_licenceN']);

        if(car['picture'] !==''){
            img4.src = car['picture'];  
            carbody = document.getElementById('morepicturecarinfo');  // use element where you want to display image
            carbody.appendChild(img4);

        }else{
            img4.src = 'profilepicture/carprofile.png';
            carbody = document.getElementById('morepicturecarinfo');  // use element where you want to display image
            carbody.appendChild(img4);
        }
        
    }
    // edit or update  car
    $("#updatecarsModal").on('show.bs.modal',function(event){
        $("#updatecarsmessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "infoCars.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {car_id: invoker.data('car_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#updatecarsmessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        car = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        // console.log(car);
                        formatupdatecarInfo();
                        
                    }
                }
            
            },
            error: function(){
                $('#updatecarsmessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });

        //submit form for updating
        $("#updatecarsform").submit(function(event){
            $("#updatecarsmessage").empty();
            event.preventDefault();
            data = $(this).serializeArray();
            // data.push(new FormData(this));
            data.push({name:'car_id', value:invoker.data('car_id')});

            $.ajax({
                url: "updatecars.php",
                type: "POST",
                //we need to send the trip_id of the trip 
                data: data,
                success: function (returnedData){ 

                    if(returnedData){

                        $('#updatecarsmessage').html(returnedData);
                        //hide modal
                        setTimeout(function(){
                            $('#updatecarsmessage').hide();
                            location.reload();
                        },3000);

                        setTimeout(function(){
                            location.reload();
                        },3000);

                    }else{
                        //hide modal
                        setTimeout(function(){
                            // $('#editdriverModal').modal('hide');
                            location.reload();
                        },3000);

                    }
                
                },
                error: function(){
                    $('#updatecarsmessage').text("There was an error with the Ajax Call. Please try again later.");

                }

            });
    
        });

    });

    //delete userform modal
    function formatdeleteuserModal(){
        $("#usernamdelete").val(user['username']);
        $("#mobileuserdelete").val(user['mobile']);
        $("#emailuserdelete").val(user['email']);
        $("#dateregistrationdelete").val(user['date_registration']);
        
        

        if(user['profilepicture'] !==''){
            img5.src = user['profilepicture'];  
            userbody = document.getElementById('imagePreviewuserdelete');  // use element where you want to display image
            userbody.appendChild(img5);

        }else{
            img5.src = 'profilepicture/useravater.png';
            userbody = document.getElementById('imagePreviewuserdelete');  // use element where you want to display image
            userbody.appendChild(img5);
        }
            
    }

    // delete user
    $("#deleteuserModal").on('show.bs.modal',function(event){
        $("#deleteusermessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //ajax call to get details for the trip
        $.ajax({
            url: "inforUser.php",
            type: "POST",
            //we need to send the trip_id of the trip 
            data: {user_id: invoker.data('user_id')},
            success: function (data){ 
                if(data){

                    if(data == 'error'){

                        $('#deleteusermessage').text("There was an error with the Ajax Call. Please try again later.");

                    }else{

                        //passe json data in array data
                        user = JSON.parse(data);
                        //fill tedit trip form using the JSON parsed data
                        // console.log(trip);
                        formatdeleteuserModal();
                        
                    }
                }
            
            },
            error: function(){
                $('#deleteusermessage').text("There was an error with the Ajax Call. Please try again later.");

            }

        });

        //delete a user
        $("#deleteuser").click(function(){
            //ajax call to get details for the user
            $.ajax({
                url: "deleteuser.php",
                type: "POST",
                //we need to send the user_id of the user 
                data: {user_id: invoker.data('user_id')},
                success: function (returnedData){ 

                    if(returnedData){

                        $('#deleteusermessage').html(returnedData);
                        

                    }else{
                        //hide modal
                        setTimeout(function(){
                            // $('#editdriverModal').modal('hide');
                            location.reload();
                        },3000);
                    }
                
                },
                error: function(){
                    $('#deleteusermessage').text("There was an error with the Ajax Call. Please try again later.");

                }

            });
        });

    });



    // //update checkbox cars checked
    $("#checkcarsavalaibleModal").on('show.bs.modal',function(event){
        $("#checkavalaiblecarmessage").empty();
        var invoker = $(event.relatedTarget);
        // console.log(invoker);

        //submit form for updating
        $("#caravailableform").submit(function(event){
            $("#checkavalaiblecarmessage").empty();
            event.preventDefault();
            data = $(this).serializeArray();
            // data.push(new FormData(this));
            data.push({name:'trip_id', value:invoker.data('trip_id')});

            $.ajax({
                url: "updateCheckcaravailable.php",
                type: "POST",
                //we need to send the trip_id of the trip 
                data: data,
                success: function (returnedData){
                    
                    if(returnedData){
                        $('#checkavalaiblecarmessage').html(returnedData);
                        setTimeout(() => {
                            $('#checkavalaiblecarmessage').hide();
                        }, 3000);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                    else{
                        $('#checkavalaiblecarmessage').html('<div class="alert alert-danger">That action is not be execute. the trip is unpaid!</div>').fadeIn();
                    }
                
                },
                error: function(){
                    $('#checkavalaiblecarmessage').text("There was an error with the Ajax Call. Please try again later.");

                }

            });
    
        });

    });

    //fetch users detail login
function fetch_user(){

    $.ajax({
      url: "fetch_all_user.php",
      type: "POST",
      success: function(data){
          $("#user_details").html(data);
      },
      error: function(){

      }
    });
}
fetch_user();

setInterval(function(){
    update_last_activity();
    fetch_user();
    update_chat_history_data();
  },5000);
  
  //last activity of the user
  function update_last_activity(){
    $.ajax({
  
      url:"../func/update_last_activity.php",
      type:"POST",
      success: function(){
  
      },
      error: function(){
  
      }
  
    });
  }

  function make_chat_dialogue_box(to_user_id,to_user_name){
    var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with &nbsp;'+to_user_name+'">';
    modal_content += '<div style="height:300px;border:1px solid #ccc;overflow-y:scroll;margin-bottom:24px;padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    modal_content += fetch_user_chat_history(to_user_id);
    modal_content += '</div>';
    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
    $('#user_modal_details').html(modal_content);
  }
  
  
  $(document).on('click','.start-chat',function(){
  
    var to_user_id = $(this).data('touserid');
    var to_user_name = $(this).data('tousername');
  
    // alert('hello');
    make_chat_dialogue_box(to_user_id,to_user_name);
  
    $("#user_dialog_"+to_user_id).dialog({
      autoOpen:false,
      width:400
    });
  
    $('#user_dialog_'+to_user_id).dialog('open');
    $('#chat_message_'+to_user_id).emojioneArea({
        pickerPosition:"top",
        toneStyle:"bullet"
      });
  
    
  });
  
  $(document).on('click','.send_chat', function(){
      var to_user_id = $(this).attr('id');
      var chat_message = $('#chat_message_'+to_user_id).val();
      $.ajax({
        url:"../func/insert_chat.php",
        type:"POST",
        data:{
          to_user_id:to_user_id,chat_message:chat_message
        },
        success:function(data){
        //   $('#chat_message_'+to_user_id).val('');
        var element = $('#chat_message_'+to_user_id).emojioneArea();
        element[0].emojioneArea.setText('');
          $('#chat_history_'+to_user_id).html(data);
        },
        error:function(){}
      });
  });

  function fetch_user_chat_history(to_user_id){
    $.ajax({
      url:"../func/fetch_user_chat_history.php",
      type:"POST",
      data:{to_user_id:to_user_id},
      success:function(data){
        $('#chat_history_'+to_user_id).html(data);
      },
      error:function(){}
    });
  }

  function update_chat_history_data(){
    $('.chat_history').each(function(){
        var to_user_id = $(this).data('touserid');
        fetch_user_chat_history(to_user_id);
    });
  }

$(document).on('click', '.ui-button-icon',function(){
    $('.user_dialog').dialog('destroy').remove();
});

//typing yes
$(document).on('focus','.chat_message', function(){
    var is_type = 'yes';
    $.ajax({
      url:"../func/update_is_type_status.php",
      type:"POST",
      data:{is_type:is_type},
      success:function(){

      }
    });
});

//typing no
$(document).on('blur','.chat_message',function(){
   var is_type = 'no';
   $.ajax({
     url:"../func/update_is_type_status.php",
     type:"POST",
      data:{is_type:is_type},
      success:function(){

      }
   });
});








