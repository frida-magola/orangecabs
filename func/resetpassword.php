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

  <title>Orange Cabs | Reset Password</title>
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
                margin-top: 50px;
            }
        
        </style>

</head>
    
    <body>
        
        <div id="container-fluid">
            <div class="row">
                
        <div class="col-sm-offset-1 col-sm-10 contactForm">
                    
         <h1>Reset Password</h1>
                    
            <div id="resultMessage"></div>            
<?php
            
if(isset($_GET['user_id']) && isset($_GET['key'])){
           
    $_SESSION['user_id'] = $_GET['user_id'];
    $_SESSION['key'] = $_GET['key'];
            
           
}
if(isset($_POST['reset'])){
    
    $opt = $_POST['opt'];
    
     
    $time = time() - 86400;
    

//    $query = "SELECT opt_hash FROM users WHERE opt_hash = {$_SESSION['key']} AND mobile = {$_SESSION['mobile']}";
    $query = "SELECT * FROM forgotpassword WHERE activation_key ='{$_SESSION['key']}' AND user_id='{$_SESSION['user_id']}' AND time > '$time' AND status='pending'";

//    $row = mysqli_num_rows($run_query);
    $run_query = $link->query($query);
    
    $row = $run_query->fetch_assoc();
    
    $opt_db = $row['activation_key'];
    
//    var_dump($opt_db);
    
    if(password_verify($opt, $opt_db)){
        

        header('Location: passwordreset.php');
        
        exit;

        
    }
    else{
          echo '<div class="alert alert-danger">Please enter the OPT you received by your email address.</div>';
    }
    
    
}            
                    
?>
            
            
<form action="resetpassword.php" method="post" class="activate">
    
    <div class="form-group">
        <label for="phone_number" class="control-form sr-only"> Your OPTr</label>

        <input class="form-control" name="opt" id="opt" type="text" placeholder="Enter your OPT" autocomplete="number" maxlength="14">
    
    </div>

    
     <div class="form-group">
         <input type="submit" class="btn btn-primary btn-lg" name="reset" value="Verify OPT">
    
    </div>
</form>

</div>
            
 </div>
            
</div>
   
</body>
</html>

   

