<?php
session_start();
include('connection.php');

//<!--    define error messages-->
$missingPickuppoint= '<p><strong>Please enter your pick up point!</strong></p>';
$invalidPickuppoint = '<p><strong>Please enter a valid pick up point!</strong></p>';
$missingDropofpoint = '<p><strong>Please enter your drop of point!</strong></p>';
$invalidDropofpoint = '<p><strong>Please enter a valid drop of point!</strong></p>';

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

//check if there are errors and print errors
if($errors){

    $resultMessage = "<div class='alert alert-danger'>$errors</div>";

    echo $resultMessage;
    exit;

}
// set search radius
$searchRadius = 10;

//longitude out of range
$departureLngOutOfRange = false;
$destinationLngOutOfRange = false;

//min max departure longitude
$deltaLongitudeDeparture = $searchRadius*360/(24901*cos(deg2rad($pickupointLatitude)));

$minLongitudeDeparture = $pickuppointLongitude - $deltaLongitudeDeparture;
if($minLongitudeDeparture<-180){
    $departureLngOutOfRange = true;
    $minLongitudeDeparture += 360;

}

$maxLongitudeDeparture = $pickuppointLongitude + $deltaLongitudeDeparture;
if($maxLongitudeDeparture>180){
    $departureLngOutOfRange = true;
    $maxLongitudeDeparture -= 360;

}


//min max destination longitude
$deltaLongitudeDestination = $searchRadius*360/(24901*cos(deg2rad($dropofpointLatitude)));

$minLongitudeDestination = $dropofpointLongitude - $deltaLongitudeDestination;
if($minLongitudeDestination<-180){
    $destinationLngOutOfRange = true;
    $minLongitudeDestination += 360;

}

$maxLongitudeDestination = $dropofpointLongitude + $deltaLongitudeDestination;
if($maxLongitudeDestination>180){
    $destinationLngOutOfRange = true;
    $maxLongitudeDestination -= 360;

}

//min max departure latitude
$deltaLatitudeDeparture = $searchRadius*180/12430;
$minLatitudeDeparture = $pickupointLatitude - $deltaLatitudeDeparture;
if($minLatitudeDeparture<-90){
    $minLatitudeDeparture = -90;
}

$maxLatitudeDeparture = $pickupointLatitude + $deltaLatitudeDeparture;
if($maxLatitudeDeparture>90){
    $maxLatitudeDeparture = 90;
}

//min max destination latitude
$deltaLatitudeDestination = $searchRadius*180/12430;
$minLatitudeDestination = $dropofpointLatitude - $deltaLatitudeDestination;
if($minLatitudeDestination<-90){
    $minLatitudeDestination = -90;
}

$maxLatitudeDestination= $dropofpointLatitude + $deltaLatitudeDestination;
if($maxLatitudeDestination>90){
    $maxLatitudeDestination = 90;
}




//build query
$sql ="SELECT * FROM trips WHERE";

//depature longitude
if($departureLngOutOfRange){
    $sql .= "((departureLongitude > $minLongitudeDeparture) OR (departureLongitude > $maxLongitudeDeparture))";

}else{

    $sql .= "(departureLongitude BETWEEN $minLongitudeDeparture AND $maxLatitudeDestination)";
}

//departure latitude
$sql .= " AND (departureLatitude BETWEEN $minLatitudeDeparture AND $maxLatitudeDeparture)";


//destination longitude
if($destinationLngOutOfRange){
    $sql .= " AND ((destinationLongitude > $minLongitudeDestination) OR (destinationLongitude > $maxLongitudeDestination))";

}else{

    $sql .= " AND (destinationLongitude BETWEEN $minLongitudeDestination AND $maxLongitudeDestination)";
}

//destionation latitude
$sql .= " AND (destinationLatitude BETWEEN $minLatitudeDestination AND $maxLatitudeDeparture)";

//run the query
$result = mysqli_query($link,$sql);

if(!$result){
    echo " ERROR: Unable to excute: $sql". mysqli_error($link);
    exit;
}

if(mysqli_num_rows($result) == 0){
    echo "<div class='alert alert-info text-center'>There are not trip matching to your search. Please click here 
        <a href='?p=booknow' class='btn btn-lg btn-warning' type='submit' role='button'>Book Now</a></div>";

        exit;

}
echo "
    <div class='alert alert-info'>
        From $pickuppoint to $dropofpoint
    </div>

";



while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    //get trips details
            $origine = $row['departure'];
            $destination = $row['destination'];
            $amountofriders = $row['amountofriders'];
            $nameofonerider = $row['nameofonerider'];
            $price = $row['price'];
            $date = date('D d M, Y h:i', strtotime($row['date']));
            $time = $row['time'];
            $trip_id = $row['trip_id'];

            //compare two dates in php
            $source =$date;
            $tripDate = DateTime::createFromFormat('D d M, Y h:i',$source);
            $today = date('D d M, Y h:i');
            $todayDate = DateTime::createFromFormat('D d M, Y h:i',$today);
            if($tripDate < $todayDate){
                continue;
            }

            //get user id 
            $person_id = $row['user_id'];

            $sql2 ="SELECT * FROM users WHERE user_id='$person_id' LIMIT 1";
            $result2 = mysqli_query($link,$sql2);

            if(!$result2){
                echo " ERROR: Unable to excute: $sql". mysqli_error($link);
                exit;
            }

            while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                    $username = $row2['username'];
                    $mobile = $row2['mobile'];
                    $profile = $row2['profile'];
            }

            echo "
            <div class='row loadtripbd alert alert-warning'>

                <div class='col-md-6'>
                    <div><span class='tripalldb departure'>Pick up point&nbsp;:&nbsp;&nbsp;</span> $origine.</div>
                    <div><span class='tripalldb departure'>Drop of point&nbsp;:&nbsp;&nbsp;</span> $destination.</div>
                    <div><span class='tripalldb date'>Date & time&nbsp;:&nbsp;&nbsp;</span>$date &nbsp;.</div>
                    
                    </div> 

                <div class='col-ms-3'>
                    <div><span class='tripalldb price'>Price&nbsp;:&nbsp;&nbsp;R</span>$price.</div>
                    <div><span class='tripalldb amountofriders'>Amount of riders&nbsp;:&nbsp;&nbsp;</span>$amountofriders.</div>
                    <div><span class='tripalldb nameofonerider'>Name of one rider&nbsp;:&nbsp;&nbsp;</span>$nameofonerider.</div>
                </div>

                <div class='col-ms-3'>
                    &nbsp;&nbsp;<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#paytripModal' data-trip_id='$trip_id'>Pay and go!</button>
                </div>

            </div>

        ";

}



?>