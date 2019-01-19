<?php

include('../func/connection.php');

//get the id of the note through Ajax
$user_id = $_POST['user_id'];

$sql = "DELETE FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}

?>