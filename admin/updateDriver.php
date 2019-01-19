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

$user_id = $_POST['user_id'];

//get username
if (empty($_POST["driverusername2"])) {

    $errors .= $missingUsername;
//    var_dump($errors);

} else {

    $user = filter_var($_POST["driverusername2"], FILTER_SANITIZE_STRING);
}


// //role
if (empty($_POST["role2"])) {

    $errors .= $missingRole;
//    var_dump($errors);

} else {

    if($_POST["role2"] == '1'){
        $role = $roleadmin;
    }else{
        $role = $roledriver;
    }

    $role = filter_var($_POST["role2"], FILTER_SANITIZE_STRING);

}

//get number
if (empty($_POST["mobile2"])) {

    $errors .= $missingmobile;
//    var_dump($errors);

} elseif (!preg_match('#^[0-9]{10}#', $_POST["mobile2"])) {
    $errors .= $invalidemobile;

} else {

    $mobile = filter_var($_POST["mobile2"], FILTER_SANITIZE_NUMBER_INT);

}

//get email
if (empty($_POST["email2"])) {

    $errors .= $missingEmail;
//    var_dump($errors);

} else {

    $email = filter_var($_POST["email2"], FILTER_SANITIZE_EMAIL);

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
//    $name = mysqli_real_escape_string($link, $name);

   $role = mysqli_real_escape_string($link, $role);

   $verify = "1";
   $date = date('Y-m-d',time());
    
        $sql = "UPDATE users SET `username`='$user',`mobile`='$mobile',`email`='$email',`verify`='$verify'
        ,`role`='$role',`date_registration`='$date' WHERE user_id='$user_id'";

        $result = mysqli_query($link, $sql);

        if (!$result) {

            echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>';

            echo '<div class="alert alert-danger">"' . mysqli_error($link) . '"</div>';

            exit;

        }

            echo "<div class=\"alert alert-success\"> driver update successful! </div>";


?>