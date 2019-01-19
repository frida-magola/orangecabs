<?php

include('connect.php');

//<!--    define error messages-->
$missingPickuppoint= 'Please enter your pick up point!';
$invalidPickuppoint = 'Please enter a valid pick up point!';
$missingDropofpoint = 'Please enter your drop of point!';
$invalidDropofpoint = 'Please enter a valid drop of point!';
$amoutofriders = 'Please enter amount of rider!';
$invalidAmountofriders= 'This input should contain number not character!';
$missingnameofonerider = 'Please enter name of one rider!';
$missingdistance = 'Distance is missing!';
$missingduration = 'Duration is missing!';
$missingPrice = 'Price is missing!';
$missingDate = 'Please select a date for your rider!';
$missingtime = 'Please select a time for your rider!';

$errors ='';

//check pick up point 
if(empty($_GET['pickuppoint'])){

    $errors .= $missingPickuppoint;

}else{

    //check the coordinates
    if(!isset($_GET['pickuppointLatitude']) OR !isset($_GET['pickuppointLatitude'])){

        $errors .= $invalidPickuppoint;

    }else{

        $pickuppointLongitude = $_GET['pickuppointLongitude'];
        $pickupointLatitude = $_GET['pickuppointLatitude'];

        $pickuppoint = filter_var($_GET['pickuppoint'], FILTER_SANITIZE_STRING);
    }
    

}

//check drop of point
//check pick up point 
if(empty($_GET['dropofpoint'])){

    $errors .= $missingDropofpoint;

}else{

    //check the coordinates
    if(!isset($_GET['dropofpointLatitude']) OR !isset($_GET['dropofpointLongitude'])){

        $errors .= $invalidDropofpoint;

    }else{

        $dropofpointLongitude = $_GET['dropofpointLongitude'];
        $dropofpointLatitude = $_GET['dropofpointLatitude'];
        $dropofpoint = filter_var($_GET['dropofpoint'], FILTER_SANITIZE_STRING);
    }

}

//check distance
if(empty($_GET['distance'])){

    $errors .= $missingdistance;

}else{

    $distance = $_GET['distance'];

}

//check duration
if(empty($_GET['duration'])){

    $errors .= $missingduration;

}else{
    
    $duration = $_GET['duration'];

}

//check duration
if(empty($_GET['price'])){

    $errors .= $missingPrice;

}else{
    
    $price = $_GET['price'];

}

//check amount of riders even price
if(empty($_GET['amountofriders'])){

    $errors .= $amoutofriders;

}elseif(preg_match('/\D/',$_GET['amountofriders'])){

    $errors .= $invalidAmountofriders;

}else{

    $amountofriders = filter_var($_GET['amountofriders'], FILTER_SANITIZE_STRING);

}

//check name of one rider
if(empty($_GET['nameofonerider'])){

    $errors .= $missingnameofonerider;

}else{

    $nameofonerider = filter_var($_GET['nameofonerider'], FILTER_SANITIZE_STRING);

}

//check if there are errors and print errors
if($errors){

    $resultMessage = $errors;

    echo $resultMessage;

}else{

    //define a table name
    $tableName = 'trips';

    //retrieve user from the session
    $query = $link->prepare("SELECT user_id FROM users WHERE mobile=:mobile");
    $query->bindParam(':mobile',$mobile);
    $mobile=$_GET['mobile'];
    $query->execute();
    $user_id= $query->fetchColumn();

    $mydate = $_GET['date'];
    $mytime =$_GET['time'];
    // $mydate = date('Y-m-d h:i', strtotime($mydate));

      //query for a regional trip
      $sql = $link->prepare("INSERT INTO $tableName (`user_id`,`departure`,`departureLatitude`,
      `departureLongitude`,`destination`, `destinationLatitude`,`destinationLongitude`,`distance`,`duration`,
       `amountofriders`,`nameofonerider`,`price`,`date`) 
      VALUES (':user_id',':pickuppoint',':pickupointLatitude',':pickuppointLongitude',
      ':dropofpoint',':dropofpointLatitude',':dropofpointLongitude',':distance',':duration',':amountofriders',
      ':nameofonerider',':price',':mydate',':mytime')");

      $sql->bindParam(':user_id',$user);
      $sql->bindParam(':departure',$departure);
      $sql->bindParam(':departureLatitude',$departureLatitude);
      $sql->bindParam(':departureLongitude',$departureLongitude);
      $sql->bindParam(':destination',$destination);
      $sql->bindParam(':destinationLatitude',$destinationLatitude);
      $sql->bindParam(':destinationLongitude',$destinationLongitude);
      $sql->bindParam(':distance',$distance);
      $sql->bindParam(':duration',$duration);
      $sql->bindParam(':amountofriders',$amountofriders);
      $sql->bindParam(':nameofonerider',$nameofonerider);
      $sql->bindParam(':price',$price);
      $sql->bindParam(':date',$date);
      $sql->bindParam(':time',$time);

      $user = $user_id;
      $departure = $departure;
      $departureLatitude = $departureLatitude;
      $departureLongitude = $departureLongitude;
      $destination = $destination;
      $destinationLatitude = $destinationLatitude;
      $destinationLongitude = $destinationLongitude;
      $distance = $distance;
      $duration = $duration;
      $amountofriders = $amountofriders;
      $nameofonerider = $nameofonerider;
      $price = $price;
      $date = $date;
      $time = $time;
        
      //run the query and and store in $results
      $result = $sql->execute();
        //check if the query is successfull
        if(!$result){
            return false;
            // echo "0";
        }else{
            return true;
            // echo "<div class='alert alert-success'>Your trip is successful created! </div>";
        }
}

?>

