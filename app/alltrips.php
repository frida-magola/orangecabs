<?php
include('connect.php');

$query = $link->prepare("SELECT user_id FROM users WHERE mobile=:mobile");
$query->bindParam(':mobile',$mobile);
$mobile=$_GET['mobile'];
$query->execute();
$user_id= $query->fetchColumn();
// var_dump($user_id);
// die();

$sql = $link->prepare("SELECT * FROM trips WHERE user_id ='$user_id' AND trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC");
$sql->execute();
$results = $sql->fetchAll();
$arr = array();
foreach ($results as $result) {
    array_push($arr,$result);
   
}
echo json_encode($arr);





