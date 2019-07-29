<?php
session_start();
include('connection.php');
require('NotifyAdmin.php');


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
if(empty($_POST['pickuppoint'])){

    $errors .= $missingPickuppoint;

}else{

    //check the coordinates
    if(!isset($_POST['pickuppointLatitude']) OR !isset($_POST['pickuppointLatitude'])){

        $errors .= $invalidPickuppoint;

    }else{

        $pickuppointLongitude = $_POST['pickuppointLongitude'];
        $pickupointLatitude = $_POST['pickuppointLatitude'];

        $pickuppoint = filter_var($_POST['pickuppoint'], FILTER_SANITIZE_STRING);
    }
    

}

//check drop of point
//check pick up point 
if(empty($_POST['dropofpoint'])){

    $errors .= $missingDropofpoint;

}else{

    //check the coordinates
    if(!isset($_POST['dropofpointLatitude']) OR !isset($_POST['dropofpointLongitude'])){

        $errors .= $invalidDropofpoint;

    }else{

        $dropofpointLongitude = $_POST['dropofpointLongitude'];
        $dropofpointLatitude = $_POST['dropofpointLatitude'];
        $dropofpoint = filter_var($_POST['dropofpoint'], FILTER_SANITIZE_STRING);
    }

}

//check distance
if(empty($_POST['distance'])){

    $errors .= $missingdistance;

}else{

    $distance = $_POST['distance'];

}

//check duration
if(empty($_POST['duration'])){

    $errors .= $missingduration;

}else{
    
    $duration = $_POST['duration'];

}

//check duration
if(empty($_POST['price'])){

    $errors .= $missingPrice;

}else{
    
    $price = $_POST['price'];

}

//check amount of riders even price
if(empty($_POST['amountofriders'])){

    $errors .= $amoutofriders;

}elseif(preg_match('/\D/',$_POST['amountofriders'])){

    $errors .= $invalidAmountofriders;

}else{

    $amountofriders = filter_var($_POST['amountofriders'], FILTER_SANITIZE_STRING);

}

//check name of one rider
if(empty($_POST['nameofonerider'])){

    $errors .= $missingnameofonerider;

}else{

    $nameofonerider = filter_var($_POST['nameofonerider'], FILTER_SANITIZE_STRING);

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
    $mydate = $_POST['date'];
    $mydate = date('Y-m-d h:i', strtotime($mydate));
    

      //query for a regional trip
      $sql = "INSERT INTO $tableName (`user_id`,`departure`,`departureLatitude`,
      `departureLongitude`,`destination`, `destinationLatitude`,`destinationLongitude`,`distance`,`duration`,
       `amountofriders`,`nameofonerider`,`price`,`date`) 
      VALUES ('$user_id','$pickuppoint','$pickupointLatitude','$pickuppointLongitude',
      '$dropofpoint','$dropofpointLatitude','$dropofpointLongitude','{$_POST['distance']}','{$_POST['duration']}','$amountofriders',
      '$nameofonerider','{$_POST['price']}','{$mydate}')";

        //run the query and and store in $results

        $result = mysqli_query($link,$sql);

        //check if the query is successfull
        if(!$result){

            echo "<div class='alert alert-danger'>There was error! the trip could not be added to the da
            tabase! </div>". mysqli_error($link);

        }else{
            echo "<div class='alert alert-success'>Your trip is successful created! </div>";

            //send the trip notification with php mailersss by Email
            /**
             * GET USER DETAILS
             */
            
            $tripDetails = array(
                'userId'=>$user_id,
                'departure'=>$pickuppoint,
                'destination'=>$dropofpoint,
                'distance'=>$distance,
                'amountofriders'=>$amountofriders,
                'nameofonerider'=>$nameofonerider,
                'price'=>$_POST['price'],
                'date'=>$mydate,
            );
            $notify = new NotifyAdmin($user_id, 'Added trip', $tripDetails);

            //send notification to the Admin Dashboard using Ajax
        }


}



?>