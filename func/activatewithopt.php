<?php 
//start session 
session_start();


//connection to database
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="Orange Cabs">
      <meta name="author" content="Quirky30">

  <title>Orange Cabs | Activation Account</title>
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
                color: #11A0DC;
            }
            
            .contactForm {
                border: 1px solid #11A0DC;
                border-radius: 20px;
/*                margin-top: 50px;*/
                margin: 7rem auto;
            }
        
        </style>

</head>

    <body>
        
        
        
        <div id="container-fluid">
            <div class="row">
                
        <div class="col-sm-offset-1 col-sm-10 contactForm">
                    
         <h3>Activation account <a href="../" ><img src="../img/icon%20thumb.png" alt="retour" width=40>
             </a></h3>

 <?php
       if(isset($_GET['mobile']) && isset($_GET['key'])){
           
            $_SESSION['mobile'] = $_GET['mobile'];
            $_SESSION['key'] = $_GET['key'];
            
           
       }
           
if(isset($_POST['signup'])){
    
    
    
    $opt = $_POST['opt'];

//    $query = "SELECT opt_hash FROM users WHERE opt_hash = {$_SESSION['key']} AND mobile = {$_SESSION['mobile']}";
    $query = "SELECT opt_hash FROM users WHERE mobile = {$_SESSION['mobile']}";
    
    
    $run_query = $link->query($query);
    
    $row = $run_query->fetch_assoc();
    
    $opt_db = $row['opt_hash'];
    
    if(password_verify($opt, $opt_db)){
        
        $query = "UPDATE users SET verify = 1, opt_hash ='' WHERE mobile = '{$_SESSION['mobile']}'";
        $query = $link->query($query);
        
         echo '<div class="alert alert-success">
         Your account has been activated.
         <a href="../index.php" type="button" class="btn btn-lg btn-success">Log in</a>
         </div>';
        
        exit;

        
    }else{
        
           //else
        //show error message 
    
    echo '<div class="alert alert-danger">Please enter the OPT you received by your mobile number.</div>';
        

    }
    
}else{
    
     echo '<div class="alert alert-danger">There was an error. Please enter the OPT you received by your phone number.</div>';
    
}
                    
?>           
            
            
            
<form action="activate.php" method="post" class="activate">
                      <div class="form-group">
                        <label for="phone_number" class="control-form sr-only"> Your OPTr</label>

                            <input class="form-control" name="opt" id="opt" type="text" placeholder="Enter your OPT" autocomplete="number" maxlength="14">
    
                        </div>

    
     <div class="form-group">
         <input type="submit" class="btn btn-primary btn-lg" name="signup" value="Activate">
    
    </div>
            </form>
                    
            
</div>
            
 </div>
            
</div>
        
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="../js/jqBootstrapValidation.js"></script>
<script src="../js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/agency.min.js"></script>
        
    </body>
</html>

   

