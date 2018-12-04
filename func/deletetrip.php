<?php
session_start();
include('connection.php');

//get the id of the note through Ajax
$trip_id = $_POST['trip_id'];

// run a query to delete the trip
$sql = "UPDATE trips SET is_delete='1' WHERE trip_id='$trip_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}

?>