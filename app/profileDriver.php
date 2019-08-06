<?php

include('../func/connection.php');

if(!empty($_GET['tripId'] && !empty($_GET['userId']))){
    
    $tripId=$_GET['tripId']; 
    $userId=$_GET['userId'];
    
    $sql = "SELECT * FROM cars
    INNER JOIN model_car
    ON cars.vehicule_model = model_car.modelcar_id 
    INNER JOIN users
    ON cars.driver_id = users.user_id
    INNER JOIN trips
    ON cars.vehicule_model = trips.car_id
    WHERE trips.user_id='".$userId."' ORDER BY trip_id DESC";

    $result = mysqli_query($link, $sql);
    //    echo $result;
    
    if(mysqli_num_rows($result) >= 1){
        while ($row[] = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $item = $row;
            $json = json_encode($item);
//            echo $json;
        }
        
    }
    else{
         echo json_encode('You have not any assignement trip yet.');
    }
     echo $json;
     
     $link->close();
}

