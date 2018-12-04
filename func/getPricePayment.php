<?php
session_start();
include('connection.php');

$trip_id = $_POST['trip_id'];

$sql = "SELECT price FROM trips WHERE trip_id='$trip_id' AND status_pay='unpaid'";

$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // $price = $row['price'];

    //encode this $row array in json data and to send it ajax
    echo json_encode($row);
}
else{
    echo "errors";
    
}

?>

