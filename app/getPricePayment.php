<?php 
include('connect.php');

$sql =$link->prepare("SELECT price FROM trips WHERE trip_id=:trip_id AND status_pay='unpaid'");
$sql->bindParam(':trip_id',$trip_id);
$trip_id = $_GET['trip_id'];
$sql->execute();
$price= $sql->fetchColumn();
// var_dump($price);
// die();
echo json_encode($price);


?>