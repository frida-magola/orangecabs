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
if(empty($obj['amountofrider'])){

    $errors .= $amoutofriders;

}elseif(preg_match('/\D/',$obj['amountofrider'])){

    $errors .= $invalidAmountofriders;

}else{

    $amountofriders = filter_var($obj['amountofrider'], FILTER_SANITIZE_STRING);

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
    $token=$obj['token'];
    $mobile=$obj['mobile']; 
    $mydate = $obj['datePicker'];
    $status = $obj['status'];
//    $mydate = date('Y-m-d h:i', strtotime($mydate));
    $user_id;
    $query="SELECT * FROM users WHERE mobile='$mobile' AND access_token='$token'";
    $resultsUser = mysqli_query($link, $query);
   
    if(mysqli_num_rows($resultsUser)>0){
        while($row = mysqli_fetch_array($resultsUser, MYSQLI_ASSOC)){
        $user_id = $row['user_id'];
        }
         
    }
//echo $user_id;
     //query for a regional trip
      $sql = "INSERT INTO $tableName (`user_id`,`departure`,`departureLatitude`,
      `departureLongitude`,`destination`, `destinationLatitude`,`destinationLongitude`,`distance`,`duration`,
       `amountofriders`,`nameofonerider`,`price`,`status_pay`,`date`) 
      VALUES ('$user_id','$pickuppoint','$pickupointLatitude','$pickuppointLongitude',
      '$dropofpoint','$dropofpointLatitude','$dropofpointLongitude','{$obj['distance']}','{$obj['duration']}','$amountofriders',
      '$nameofonerider','{$obj['price']}','{$obj['status']}','{$mydate}')";

        //run the query and and store in $results

        $result = mysqli_query($link,$sql);
        //run the query and and store in $results

        //check if the query is successfull
        if(!$result){

            echo json_encode("There was error! the trip could not be added to the da
            tabase!");

        }else{
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
                'price'=>$obj['price'],
                'date'=>$mydate,
            );
            $notify = new NotifyAdmin($user_id, 'Added trip', $tripDetails);
            //send notification to the Admin Dashboard using Ajax
            echo json_encode('ok');
        }
}

?>



