<?php 
//start session 
session_start();

//connection to database
include('connection.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Email Activation</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            h1 {
                color: purple;
            }
            
            .contactForm {
                border: 1px solid #7d4abf;
                border-radius: 20px;
                margin-top: 50px;
            }
        
        </style>
    </head>
    
    <body>
        
        <div id="container-fluid">
            <div class="row">
                
        <div class="col-sm-offset-1 col-sm-10 contactForm">
                    
         <h1>Email Activation</h1>
                    
                 
<?php

//if email or activation key is missing show error
if(
    !isset($_GET["email"]) || !isset($_GET["newemail"]) || !isset($_GET["key"])
){
    
    echo '<div class="alert alert-danger">There was an error. Please click on the activation you received by email.</div>';
    
    exit;
}

//else
    //store them in two variables
$email = $_GET["email"];
$newemail = $_GET["newemail"];
$key = $_GET["key"];

//prepare variables for query
$email = mysqli_real_escape_string($link,$email);
$newemail = mysqli_real_escape_string($link,$newemail);
$key =mysqli_real_escape_string($link,$key);

//run query:update email
$sql = "UPDATE users SET email='$newemail', verify='1', opt_hash='' WHERE (email='$email' AND opt_hash='$key') LIMIT 1";
            
$result = mysqli_query($link,$sql);

//if query is successful, show success message 

if(mysqli_affected_rows($link) == 1){
    
    session_destroy();
    // setcookie("rememberme","", time()-3600);
  
    echo '<div class="alert alert-success">Your email has been updated.</div>';
    
    echo '<a href="index.php" type="button" class="btn btn-lg btn-success">Log in</a>';
    
}else{
    
    //else
        //show error message 
    
    echo '<div class="alert alert-danger">Your email could not be updated. Please try again later.</div>';
    
    echo '<div class="alert alert-danger">"'.mysqli_error($link).'"</div>';
    
}
                    
?>

</div>
            
 </div>
            
</div>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
        
    </body>
</html>

   

