<?php 
include('connect.php');



// run a query to delete the trip
$sql = $link->prepare("UPDATE trips SET is_delete='1' WHERE trip_id=:trip_id");
$sql->bindParam(':trip_id',$trip_id);
//get the id of the trip send through android app
$trip_id = $_GET['trip_id'];
$ql->execute();


?>