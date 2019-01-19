<?php
session_start();
include('../func/connection.php');

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
// $missingDate = '<p><strong>Please select a date for your rider!</strong></p>';
// $missingtime = '<p><strong>Please select a time for your rider!</strong></p>';

$errors ='';


//check pick up point 
if(empty($_POST['pickuppointadmin'])){

    $errors .= $missingPickuppoint;

}else{

    //check the coordinates
    if(!isset($_POST['pickuppointLatitude']) OR !isset($_POST['pickuppointLatitude'])){

        $errors .= $invalidPickuppoint;

    }else{

        $pickuppointLongitude = $_POST['pickuppointLongitude'];
        $pickupointLatitude = $_POST['pickuppointLatitude'];

        $pickuppoint = filter_var($_POST['pickuppointadmin'], FILTER_SANITIZE_STRING);
    }
    

}

//check drop of point
//check pick up point 
if(empty($_POST['dropofpointadmin'])){

    $errors .= $missingDropofpoint;

}else{

    //check the coordinates
    if(!isset($_POST['dropofpointLatitude']) OR !isset($_POST['dropofpointLongitude'])){

        $errors .= $invalidDropofpoint;

    }else{

        $dropofpointLongitude = $_POST['dropofpointLongitude'];
        $dropofpointLatitude = $_POST['dropofpointLatitude'];
        $dropofpoint = filter_var($_POST['dropofpointadmin'], FILTER_SANITIZE_STRING);
    }

}

//check distance
if(empty($_POST['distanceadmin'])){

    $errors .= $missingdistance;

}else{

    $distance = $_POST['distanceadmin'];

}

//check duration
if(empty($_POST['durationadmin'])){

    $errors .= $missingduration;

}else{
    
    $duration = $_POST['durationadmin'];

}

//check duration
if(empty($_POST['priceadmin'])){

    $errors .= $missingPrice;

}else{
    
    $price = $_POST['priceadmin'];

}

//check if there are errors and print errors
if($errors){

    $resultMessage = "<div class='alert alert-danger'>$errors</div>";

    echo $resultMessage;

}else{

    //no error prepare variables for the query
    $pickuppoint = mysqli_real_escape_string($link,$pickuppoint);
    $dropofpoint = mysqli_real_escape_string($link,$dropofpoint);
    // $nameofonerider = mysqli_real_escape_string($link,$nameofonerider);

    //define a table name
    $tableName = 'trips';

    //retrieve user from the session
    $user_id = $_SESSION['user_id'];
    // $mydate = $_POST['date'];
    $mydate = date('Y-m-d h:i', time());
    

      //query for a regional trip
      $sql = "INSERT INTO $tableName (`user_id`,`departure`,`departureLatitude`,
      `departureLongitude`,`destination`, `destinationLatitude`,`destinationLongitude`,`distance`,`duration`,
        `price`,`date`,`car_id`) 
      VALUES ('$user_id','$pickuppoint','$pickupointLatitude','$pickuppointLongitude',
      '$dropofpoint','$dropofpointLatitude','$dropofpointLongitude','{$_POST['distanceadmin']}','{$_POST['durationadmin']}',
      '{$_POST['priceadmin']}','{$mydate}','')";

        //run the query and and store in $results

        $result = mysqli_query($link,$sql);

        //check if the query is successfull
        if(!$result){

            echo "<div class='alert alert-danger'>There was error! the trip could not be added to the da
            tabase! </div>". mysqli_error($link);

        }else{
            echo "<div class='alert alert-success'>Your trip is successful created! </div>";
        }
}

?>