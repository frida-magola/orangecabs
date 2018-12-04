// Ajax call to updateusername.php
$("#updateusernameform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == 'success'){
                $("#messageusername").html("<div class='alert alert-success'>Your name is successfull updated!</div>");
                setTimeout(function(){
                    location.reload(); 
                },3000);
            }else{
                location.reload();   
            }
        },
        error: function(){
            $("#messageusername").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

// Ajax call to updateusername.php
$("#updatemobilenumber").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatemobilenumber.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            // if(data){
                
            // }else{
            //     location.reload();   
            // }
            $("#mobilenumberMessage").html(data);
                setTimeout(function(){
                    location.reload(); 
                },3000);
        },
        error: function(){
            $("#mobilenumberMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//reload location when the modal closed
$('#updateusernameModal').on('hidden.bs.modal', function () {
    location.reload();
});

// Ajax call to updatepassword.php
$("#updatepasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){

            $("#updatepasswordMessage").html(data);
            setTimeout(function(){
                location.reload(); 
            },3000);
        },
        error: function(){
            $("#updatepasswordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});



// Ajax call to updateemail.php
$("#updateemailform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $("#emailupdateMessage").html(data);
                setTimeout(function(){
                    location.reload(); 
                },3000);
            // if(data){
            //     $("#").html(data);
            // }
        },
        error: function(){
            $("#emailupdateMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//update picture preview
var file, imageType,imageName,imageSize;
var wrongType;

$("#picture").change(function(){

    file = this.files[0];
    // console.log(file);
    imageType = file.type;
    imageSize = file.size;
    imageName = file.name;

    //check image type
    var acceptableType = ["image/jpeg", "image/png", "image/jpg"];

    wrongType = ($.inArray(imageType,acceptableType) == -1);

    if(wrongType){

        $("#updatepicturemessage")
        .html("<div class='alert alert-danger'>Only jpeg, png and jpg are accepted !.</div>");

        return false;
    }

    //check image size is super 3 mega byte(Mo)
    if(imageSize > 3*1024*1024){

        $("#updatepicturemessage")
        .html("<div class='alert alert-danger'>Please upload an image less than 3Mo !.</div>");

        return false;
    }

    //fileReader object will be used to convert the image in a binary string
    var reader = new FileReader();

    //callback 
    reader.onload = updatePreviewPicture;

    //start read operation = convert content into a data url
    reader.readAsDataURL(file);

});

// updatePreviewPicyure function
function updatePreviewPicture(event){
    // console.log(event);
    $("#imagePreview").attr("src", event.target.result);
}

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

            $("#updatepicturemessage")
            .html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});