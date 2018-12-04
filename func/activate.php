<?php 
//start session 
session_start();


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

    <title>Orange cabs | Activation Account</title>
    
</head>

<body>    
    <section class="section-book">
        <div class="row">
            <div class="book">
                <div class="book__form">
                    <div class="u-margin-bottom-small">
                        <h2 class="heading-secondary">
                            Activation Account
                        </h2>
                    </div>
 <?php
if (isset($_GET['mobile']) && isset($_GET['key'])) {

    $_SESSION['mobile'] = $_GET['mobile'];
    $_SESSION['key'] = $_GET['key'];


}

if (isset($_POST['signup'])) {

    $opt = $_POST['opt'];

//    $query = "SELECT opt_hash FROM users WHERE opt_hash = {$_SESSION['key']} AND mobile = {$_SESSION['mobile']}";
    $query = "SELECT opt_hash FROM users WHERE mobile = {$_SESSION['mobile']}";

    $run_query = $link->query($query);

    $row = $run_query->fetch_assoc();

    $opt_db = $row['opt_hash'];

    if (password_verify($opt, $opt_db)) {

        $query = "UPDATE users SET verify = 1, opt_hash ='' WHERE mobile = '{$_SESSION['mobile']}'";
        $query = $link->query($query);

        echo '<div class="alert alert__success u-margin-bottom-small">
         <p class="paragraph" style="color:#333;">Your account has been activated.</p>
         <a href="../" type="button" class="btn btn--green">Log in</a>
         </div>';

        exit;


    } else {
        
           //else
        //show error message 

        echo '<div class="alert alert__danger u-margin-bottom-small">
        <p class="paragraph">
        Please enter the OPT you received by your email address.</p>
        </div>';


    }

}

?>                         
 <form action="activate.php" method="post" class="form">
            <div class="form__group">
                <div class="form__input-icon">
                    <label for="opt" class="form__label">OPT</label>
                    <input type="text" class="form__input" placeholder="Enter your OPT" name="opt" id="opt">
                        <i class="fas fa-user" aria-hidden="true"></i>
                        
                </div>
            </div>

            <div class="form__group">
                <input type="submit" class="btn btn--green" id="signupButton" name="signup" value="Activate &rarr;"/>
                <a href="../" class="btn btn--default  modal__cancelactivate" role="button">Cancel</a>
            </div>

        </form>
    </div>
 </div>
</div>
</section>
                    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script src="./src/js/jquery-3.3.1.min.js"></script> -->
    <script src="index.js"></script>     
    </body>
</html>

   

