<?php

include('../func/connection.php');
require('NotifyAdmin.php');

$json = file_get_contents('php://input'); 	
$obj = json_decode($json,true);
 

//<!--    define error messages-->
$missingPickuppoint= 'Please enter your pick up point!';
$invalidPickuppoint = 'Please enter a valid pick up point!';
$missingDropofpoint = 'Please enter a valid drop of point!';
$amoutofriders = 'Please enter amount of rider!';
$invalidAmountofriders= 'This input should contain number not character!';
$missingnameofonerider = 'Please enter name of one rider!';
$missingdistance = 'Distance is missing!';
$missingduration = 'Duration is missing!';
$missingPrice = 'Price is missing!';
$missingDate = 'Please select a date for your rider!';
$missingtime = 'Please select a time for your rider!';

$errors ='';
$paymentOptions;
//check pick up point 
if(empty($obj['pickup'])){

    $errors .= $missingPickuppoint;

}else{

    //check the coordinates
    if(!isset($obj['pickuplatitude']) OR !isset($obj['pickuplongitude'])){

        $errors .= $invalidPickuppoint;

    }else{

        $pickuppointLongitude = $obj['pickuplongitude'];
        $pickupointLatitude = $obj['pickuplatitude'];

        $pickuppoint = filter_var($obj['pickup'], FILTER_SANITIZE_STRING);
    }
    

}

//check drop of point
//check pick up point 
if(empty($obj['dropoff'])){

    $errors .= $missingDropofpoint;

}else{

    //check the coordinates
    if(!isset($obj['dropofflatitude']) OR !isset($obj['dropofflongitude'])){

        $errors .= $invalidDropofpoint;

    }else{

        $dropofpointLongitude = $obj['dropofflongitude'];
        $dropofpointLatitude = $obj['dropofflatitude'];
        $dropofpoint = filter_var($obj['dropoff'], FILTER_SANITIZE_STRING);
    }

}

//check distance
if(empty($obj['distance'])){

    $errors .= $missingdistance;

}else{

    $distance = $obj['distance'];

}

//check duration
if(empty($obj['duration'])){

    $errors .= $missingduration;

}else{
    
    $duration = $obj['duration'];

}

//check duration
if(empty($obj['price'])){

    $errors .= $missingPrice;

}else{
    
    $price = $obj['price'];

}

//check amount of riders even price
if(empty($obj['numberofrider'])){

    $errors .= $amoutofriders;

}elseif(preg_match('/\D/',$obj['numberofrider'])){

    $errors .= $invalidAmountofriders;

}else{

    $amountofriders = filter_var($obj['numberofrider'], FILTER_SANITIZE_STRING);

}

//check name of one rider
if(empty($obj['nameofrider'])){

    $errors .= $missingnameofonerider;

}else{

    $nameofonerider = filter_var($obj['nameofrider'], FILTER_SANITIZE_STRING);

}

//check if there are errors and print errors
if($errors){
    
    echo json_encode($errors);

}else{

    //no error prepare variables for the query
    $pickuppoint = mysqli_real_escape_string($link,$pickuppoint);
    $dropofpoint = mysqli_real_escape_string($link,$dropofpoint);
    $nameofonerider = mysqli_real_escape_string($link,$nameofonerider);

    //define a table name
    $tableName = 'trips';

    //retrieve user from the database
    $tripId=$obj['tripId'];
    $userId=$obj['userId']; 
    $mydate = $obj['datePicker'];
    $paymentOptions=$obj['paymentmethod'];

    //query for update a trip
      $sql = "UPDATE $tableName SET `departure`='$pickuppoint',`departureLatitude`='$pickupointLatitude',
      `departureLongitude`='$pickuppointLongitude',`destination`='$dropofpoint',`destinationLatitude`='$dropofpointLatitude',
      `destinationLongitude`='$dropofpointLongitude',`distance`='{$obj['distance']}',`duration`='{$obj['duration']}',
      `amountofriders`='$amountofriders',`nameofonerider`='$nameofonerider',`price`='{$obj['price']}',`payment`='$paymentOptions',`date`='{$mydate}' WHERE `trip_id`='$tripId' AND user_id='$userId' LIMIT 1";

        //run the query and and store in $results

        $result = mysqli_query($link,$sql);
        //run the query and and store in $results

        //check if the query is successfull
        if(!$result){

            echo json_encode("There was error! the trip could not be added to the da
            tabase!");

        }else{
            echo json_encode('ok');
        }
}


