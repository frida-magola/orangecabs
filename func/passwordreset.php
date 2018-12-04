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
        <title>Reset Password</title>
          <link rel="shortcut icon" type="icon" href="../img/favicon.png" />

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
<!-- social media icons  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="../css/agency.min.css" rel="stylesheet">
  <link href="../orangecabs.css" rel="stylesheet">
        
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
                    
         <h3>Reset Password <a href="../" ><img src="../img/icon%20thumb.png" alt="retour" width=40>
             </a></h3>
           
<?php

   
?>
            
<form method=post id=passwordreset class="activate">

<input type=hidden name=key value=$key>
<input type=hidden name=user_id value=$user_id>

<div class='form-group'>
    <label class='sr-only' for='password'>Enter your new password:</label>
    
    <input type='password' name='password' id='password' class="form-control" placeholder="Enter Password">
</div>

<div class='form-group'>
    <label class='sr-only' for='password2'>Re-Enter your new password:</label>
    
    <input type='password' name='password2' id='password2' class="form-control" placeholder="Re-Enter Password">
</div>

<input type="submit" name='submit' value='Reset Password' class='btn btn-lg btn-success'>

</form>

</div>
            
 </div>
            
</div>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
        
<script>
    $("#passwordreset").submit(function(event){
        
        event.preventDefault();
        
        var datatopost = $(this).serializeArray();
        
        $.ajax({
            
            url: "storeresetpassword.php",
            type: "POST",
            data: datatopost,
            success: function(data){
              
                $("#resultMessage").html(data);
                
            },
            error: function(){
                
                $("#resultMessage").html("<div class='alert alert-danger'>There was an error with the ajax Call. Please try again later.</div>");
            }
        });
        
    });
        
</script>
        
</body>
</html>

   

