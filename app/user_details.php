<?php 

include('connect.php');

$query = $link->prepare("SELECT * FROM users WHERE mobile=:mobile");
$query->bindParam(':mobile',$mobile);
$mobile=$_GET['mobile'];
$query->execute();
$user= $query->fetchAll();
echo json_encode($user);

?>