<?php

include('../func/connection.php');

if(!empty($_GET['mobile'] && !empty($_GET['token']))){
     //retrieve user from the database
    $token=$_GET['token'];
    $mobile=$_GET['mobile']; 
    $user_id;
    $query="SELECT * FROM users WHERE mobile='$mobile' AND access_token='$token'";
    $resultsUser = mysqli_query($link, $query);
   
    if(mysqli_num_rows($resultsUser)>0){
        while($row = mysqli_fetch_array($resultsUser, MYSQLI_ASSOC)){
        $user_id = $row['user_id'];
        }     
    }
    //    echo $user_id;

        $sql = "SELECT * FROM trips  
            INNER JOIN users
            ON trips.user_id = users.user_id
            WHERE trips.driver_id='$user_id' ORDER BY trip_id DESC";

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

