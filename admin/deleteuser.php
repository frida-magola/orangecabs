<?php

include('../func/connection.php');

//get the id of the note through Ajax
$user_id = $_POST['user_id'];

// run a query to delete the trip

// check status of the user
 //<!-- if email exists in the users tables print error-->
 $sql_status_user = "SELECT * FROM users WHERE verify='1'";

 $result = mysqli_query($link, $sql_status_user);

 if (!$result) {

     echo '<div class="alert alert-danger">Error running the query!</div>';

     echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';

     exit;
 }

 $results = mysqli_num_rows($result);

 if ($results) {

    // echo "error";

     echo '<div class="alert alert-danger">That user could not be deleted. He is an active user!</div>';
     exit;
 }

$sql = "DELETE FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    // echo 'error';   
}

?>