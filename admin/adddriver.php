<?php

session_start();
include('../func/connection.php');

// <!--check user inputs-->
//<!--    define error messages-->
$missingUsername = '<p><strong>Please enter a driver user name!</strong></p>';
$missingname = '<p><strong>Please enter a driver name!</strong></p>';
$missingdriver = '<p><strong>Please enter a driver role!</strong></p>';
$missingmobile = '<p><strong>Please enter your mobile number!</strong></p>';
$invalidemobile = '<p><strong>Invalid number, your number should have 10 numbers no letters!</strong></p>';

$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalideEmail = '<p><strong>Please enter a valid email address!</strong></p>';

$errors ='';
$role ='';
$roleadmin = 'admin';
$roledriver ='driver';

//get username
if (empty($_POST["driverusername"])) {

    $errors .= $missingUsername;
//    var_dump($errors);

} else {

    $user = filter_var($_POST["driverusername"], FILTER_SANITIZE_STRING);
}

//name
if (empty($_POST["name"])) {

    $errors .= $missingUsername;
//    var_dump($errors);

} else {

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
}

// //role
if (empty($_POST["role"])) {

    $errors .= $missingRole;
//    var_dump($errors);

} else {

    if($_POST["role"] == '1'){
        $role = $roleadmin;
    }else{
        $role = $roledriver;
    }

    $role = filter_var($_POST["role"], FILTER_SANITIZE_STRING);

}

//get number
if (empty($_POST["mobile"])) {

    $errors .= $missingmobile;
//    var_dump($errors);

} elseif (!preg_match('#^[0-9]{10}#', $_POST["mobile"])) {
    $errors .= $invalidemobile;

} else {

    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);

}

//get email
if (empty($_POST["email"])) {

    $errors .= $missingEmail;
//    var_dump($errors);

} else {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors .= $invalideEmail; 
//        var_dump($errors);

    }
}


//<!--    if there are any errors prints errors-->
if ($errors) {

    $resultMessage = '<div class="alert alert-danger">' . $errors.  '</div>';
    echo $resultMessage;
   exit;

} 

//<!--no errors-->   
//<!--    prepare variables for the queries--> 
   $user = mysqli_real_escape_string($link, $user);

   $mobile = mysqli_real_escape_string($link, $mobile);

   $email = mysqli_real_escape_string($link, $email);
   $name = mysqli_real_escape_string($link, $name);

   $role = mysqli_real_escape_string($link, $role);

   $verify = "1";
   $date = date('Y-m-d',time());

   $fullname = $name ."    ". $user;

    //get the name of the file
    $name = $_FILES["picturedriver"]["name"];
    $extension = pathinfo($name, PATHINFO_EXTENSION);

    $fileError = $_FILES["picturedriver"]["error"];

    //tempory location
    $tmp_name = $_FILES["picturedriver"]["tmp_name"];

    $permanentDestionation = 'profilepicture/'. md5(time()) . ".$extension";

//    $role = mysqli_real_escape_string($link, $role);

    // if picture  exists in the driver table print error

    $sql = "SELECT * FROM users WHERE profilepicture= '$permanentDestionation'";


    $result = mysqli_query($link, $sql);
    
    if (!$result) {
 
        echo '<div class="alert alert-danger"> Error running the query!</div>';
 
        echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';
 
        exit;
 
    }
    $results = mysqli_num_rows($result);
 
    if ($results) {
 
        echo '<div class="alert alert-danger">That picture is already exist. </div>';
        exit;
    }
    
    // if username exists in the users table print error

   $sql = "SELECT * FROM users WHERE username = '$fullname'";


   $result = mysqli_query($link, $sql);
   
   if (!$result) {

       echo '<div class="alert alert-danger"> Error running the query!</div>';

       echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';

       exit;

   }
   $results = mysqli_num_rows($result);

   if ($results) {

       echo '<div class="alert alert-danger">That username is already exist. </div>';
       exit;
   }

    
    //<!--    if mobile number exists in the users table print error-->    
   $sql = "SELECT * FROM users WHERE mobile = '$mobile'";

   $result = mysqli_query($link, $sql);

   if (!$result) {

       echo '<div class="alert alert-danger"> Error running the query!</div>';

       echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';

       exit;
   }
   $results = mysqli_num_rows($result);

   if ($results) {

       echo '<div class="alert alert-danger">That mobile number is already exist </div>';
       exit;
   }
       
    //<!-- if email exists in the users tables print error-->
   $sql_email = "SELECT * FROM users WHERE email='$email'";

   $result = mysqli_query($link, $sql_email);

   if (!$result) {

       echo '<div class="alert alert-danger">Error running the query!</div>';

       echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';

       exit;
   }

   $results = mysqli_num_rows($result);

   if ($results) {

       echo '<div class="alert alert-danger">That Email address is already exist</div>';
       exit;
   }
    
   if(move_uploaded_file($tmp_name, $permanentDestionation)){
        //insert user details and activation code in the users table
        $sql = "INSERT INTO users(`username`,`mobile`,`email`,`verify`,`profilepicture`,`role`,`date_registration`) 
        VALUES('$fullname','$mobile','$email','$verify','$permanentDestionation','$role','$date')";

        $result = mysqli_query($link, $sql);

        if (!$result) {

            echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>';

            echo '<div class="alert alert-danger">"' . mysqli_error($link) . '"</div>';

            exit;

        }

            echo "<div class=\"alert alert-success\">New driver added successful! </div>";

    }



?>