//Ajax Call for the sign up form 
//Once the form is submitted
$("#signupform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "func/signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#messagesignup").html(data);
            }
        },
        error: function(){
            $("#messagesignup").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "func/login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "users"){

                window.location = "func/bookings.php";
                
            }else if(data == 'admin'){

                window.location = "admin/";
            }
            else{
                $('#messagelogin').html(data);   
            }
        },
        error: function(){
            $("#messagelogin").html("<div class='alert alert__danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }   
    });
});


//Ajax Call for the forgot password form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "func/forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            $('#messageforgotpassword').html(data);
        },
        error: function(){
            $("#messageforgotpassword").html("<div class='alert alert__danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//menu toggle
$(".menu").click(function(){
    $('.navbar__list').toggle('speed');
});

$("#signupButton").click(function(){
    $("#cancelsignup").hide();
});

$("#forgotemailsub").click(function(){
    $("#cancelforgot").hide();
})

//close button alert
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}

$("#loginButton").click(function(){
    $("#cancellogin").css({"top":"50rem"})
})