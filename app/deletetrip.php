<?php 
include('../func/connection.php');

// run a query to delete the trip
if(!empty($_GET['trip_id'])){
    
    $trip_id = $_GET['trip_id'];
    $sql = "UPDATE trips SET is_delete='1' WHERE trip_id='$trip_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo json_encode('error');   
    }
    echo json_encode('ok');
}

?>