<?php

include('../func/connection.php');

//get the id of the note through Ajax
$car_id = $_POST['car_id'];

$sql = "DELETE FROM cars WHERE car_id='$car_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}

?>