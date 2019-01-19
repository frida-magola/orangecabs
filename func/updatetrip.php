<?php
session_start();
include('connection.php');

//<!--    define error messages-->
$missingPickuppoint= '<p><strong>Please enter your pick up point!</strong></p>';
$invalidPickuppoint = '<p><strong>Please enter a valid pick up point!</strong></p>';
$missingDropofpoint = '<p><strong>Please enter your drop of point!</strong></p>';
$invalidDropofpoint = '<p><strong>Please enter a valid drop of point!</strong></p>';
$amoutofriders = '<p><strong>Please enter amount of rider!</strong></p>';
$invalidAmountofriders= '<p><strong>This input should contain number not character!</strong></p>';
$missingnameofonerider = '<p><strong>Please enter name of one rider!</strong></p>';
$missingdistance = '<p><strong>Distance is missing!</strong></p>';
$missingduration = '<p><strong>Duration is missing!</strong></p>';
$missingPrice = '<p><strong>Price is missing!</strong></p>';
$missingDate = '<p><strong>Please select a date for your rider!</strong></p>';
$missingtime = '<p><strong>Please select a time for your rider!</strong></p>';

$errors ='';


//check pick up point 
if(empty($_POST['pickuppoint2'])){

    $errors .= $missingPickuppoint;

}else{

    //check the coordinates
    if(!isset($_POST['pickuppointLatitude']) OR !isset($_POST['pickuppointLatitude'])){

        $errors .= $invalidPickuppoint;

    }else{

        $pickuppointLongitude = $_POST['pickuppointLongitude'];
        $pickupointLatitude = $_POST['pickuppointLatitude'];

        $pickuppoint = filter_var($_POST['pickuppoint2'], FILTER_SANITIZE_STRING);
    }
    

}

//check drop of point
//check pick up point 
if(empty($_POST['dropofpoint2'])){

    $errors .= $missingDropofpoint;

}else{

    //check the coordinates
    if(!isset($_POST['dropofpointLatitude']) OR !isset($_POST['dropofpointLongitude'])){

        $errors .= $invalidDropofpoint;

    }else{

        $dropofpointLongitude = $_POST['dropofpointLongitude'];
        $dropofpointLatitude = $_POST['dropofpointLatitude'];
        $dropofpoint = filter_var($_POST['dropofpoint2'], FILTER_SANITIZE_STRING);
    }

}

//check distance
if(empty($_POST['distance2'])){

    $errors .= $missingdistance;

}else{

    $distance = $_POST['distance2'];

}

//trip id
$trip_id= $_POST['trip_id'];

//check duration
if(empty($_POST['duration2'])){

    $errors .= $missingduration;

}else{
    
    $duration = $_POST['duration2'];

}

//check duration
if(empty($_POST['price2'])){

    $errors .= $missingPrice;

}else{
    
    $price = $_POST['price2'];

}

//check amount of riders even price
if(empty($_POST['amountofriders2'])){

    $errors .= $amoutofriders;

}elseif(preg_match('/\D/',$_POST['amountofriders2'])){

    $errors .= $invalidAmountofriders;

}else{

    $amountofriders = filter_var($_POST['amountofriders2'], FILTER_SANITIZE_STRING);

}

//check name of one rider
if(empty($_POST['nameofonerider2'])){

    $errors .= $missingnameofonerider;

}else{

    $nameofonerider = filter_var($_POST['nameofonerider2'], FILTER_SANITIZE_STRING);

}

//check if there are errors and print errors
if($errors){

    $resultMessage = "<div class='alert alert-danger'>$errors</div>";

    echo $resultMessage;

}else{

    //no error prepare variables for the query
    $pickuppoint = mysqli_real_escape_string($link,$pickuppoint);
    $dropofpoint = mysqli_real_escape_string($link,$dropofpoint);
    $nameofonerider = mysqli_real_escape_string($link,$nameofonerider);

    //define a table name
    $tableName = 'trips';

    //retrieve user from the session
    $user_id = $_SESSION['user_id'];
    $mydate = $_POST['date2'];
    $mydate = date('Y-m-d h:i', strtotime($mydate));
    

      //query for a regional trip
      $sql = "UPDATE $tableName SET `departure`='$pickuppoint',`departureLatitude`='$pickupointLatitude',
      `departureLongitude`='$pickuppointLongitude',`destination`='$dropofpoint',`destinationLatitude`='$dropofpointLatitude',
      `destinationLongitude`='$dropofpointLongitude',`distance`='{$_POST['distance2']}',`duration`='{$_POST['duration2']}',
      `amountofriders`='$amountofriders',`nameofonerider`='$nameofonerider',`price`='{$_POST['price2']}',`date`='{$mydate}' WHERE `trip_id`='$trip_id' LIMIT 1";

        //run the query and and store in $results

        $result = mysqli_query($link,$sql);

        //check if the query is successfull
        if(!$result){

            echo "<div class='alert alert-danger'>There was error! the trip could not be updated! </div>". mysqli_error($link);

        }else{
            echo "<div class='alert alert-success'>Your trip is successful updated! </div>";
        }

}

?>