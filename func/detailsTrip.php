<?php
session_start();
include('connection.php');

$trip_id = $_POST['trip_id'];

$sql = "SELECT * FROM trips WHERE trip_id='$trip_id'";

$result = mysqli_query($link,$sql);

if(!$result){

    echo "errors";
}
else{

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //encode this $row array in json data and to send it ajax
    echo json_encode($row);
}

?>