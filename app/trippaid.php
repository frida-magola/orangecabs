<?php

include('connect.php');
//get current user
$query = $link->prepare("SELECT user_id FROM users WHERE mobile=:mobile");
$query->bindParam(':mobile',$mobile);
$mobile=$_GET['mobile'];
$query->execute();
$user_id= $query->fetchColumn();
//run a query to look for notes corresponding to user_id
$sql = $link->prepare("SELECT * FROM trips WHERE user_id ='$user_id' AND trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='paid' ORDER BY trip_id DESC");
$sql->execute();
$results = $sql->fetchAll();
$arr = array();
foreach ($results as $result) {
    array_push($arr,$result);
   
}
echo json_encode($arr);





