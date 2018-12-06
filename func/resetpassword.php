<?php 
//start session 
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
//connection to database
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../favicon.ico">

    <title>Orange cabs | Reset Password</title>
    
</head>

<body>    
    <section class="section-book">
        <div class="row">
            <div class="book">
                <div class="book__form">
                    <div class="u-margin-bottom-small">
                        <h2 class="heading-secondary">
                            Reset your password 
                            <a href="http://localhost/orangecabs/?p=home" type="button" class="btn btn-outline-warning"> <i class="fas fa-arrow-circle-left" style="font-size:1.2rem;"></i>Back</a>
                        </h2>
                    </div>
 <?php
// if (isset($_GET['mobile']) && isset($_GET['key']) && isset($_GET['user_id'])) {

//     $_SESSION['mobile'] = $_GET['mobile'];
//     $_SESSION['key'] = $_GET['key'];
//     $_SESSION['user_id'] = $_GET['user_id'];


// }

// if (isset($_POST['signup'])) {

//     $opt = $_POST['opt'];

// //    $query = "SELECT opt_hash FROM users WHERE opt_hash = {$_SESSION['key']} AND mobile = {$_SESSION['mobile']}";
//     $query = "SELECT opt_hash FROM users WHERE mobile = {$_SESSION['mobile']}";

//     $run_query = $link->query($query);

//     $row = $run_query->fetch_assoc();

//     $opt_db = $row['opt_hash'];

//     if (password_verify($opt, $opt_db)) {

//         $query = "UPDATE users SET verify = 1, opt_hash ='' WHERE mobile = '{$_SESSION['mobile']}'";
//         $query = $link->query($query);

//         echo '<div class="alert alert__success u-margin-bottom-small">
//          <p class="paragraph" style="color:#333;">Your account has been activated.</p>
//          <a href="../" type="button" class="btn btn--green">Log in</a>
//          </div>';

//         exit;


//     } else {
        
//            //else
//         //show error message 

//         echo '<div class="alert alert__danger u-margin-bottom-small">
//         <p class="paragraph">
//         Please enter the OPT you received by your email address.</p>
//         </div>';


//     }

// }

?>                         
 <form action="" method="post" class="form" id="forgotpasswordform">
     <div id="messageforgotpassword"></div>
            <div class="form__group">
                <div class="form__input-icon">
                    <label for="newpassword" class="form__label">New Password</label>
                    <input type="password" class="form__input" placeholder="Enter new password" name="newpassword" id="newpassword">
                        <i class="fas fa-user" aria-hidden="true"></i>
                        
                </div>
                <div class="form__input-icon">
                    <label for="confirmpassword" class="form__label">Confirm password</label>
                    <input type="password" class="form__input" placeholder="Confirm password" name="confirmpassword" id="confirmpassword">
                        <i class="fas fa-lock" aria-hidden="true"></i>
                        
                </div>
            </div>

            <div class="form__group">
                <input type="submit" class="btn btn--green" id="forgotButton" name="forgotButton" value="Reset &rarr;"/>
                <a href="../" class="btn btn--default  modal__cancelactivate" role="button">Cancel</a>
            </div>

        </form>
    </div>
 </div>
</div>
</section>
                    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script src="./src/js/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="index.js"></script>      -->
    <script>
        $("#forgotpasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "update-forgotpassword.php",
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
    </script>
    </body>
</html>

   

