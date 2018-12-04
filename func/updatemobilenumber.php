<?php 
//start session an connect
session_start();

include('connection.php');
$errors='';
$invalidemobile = '<p><strong>Invalid number, your number should have 10 numbers no letters!</strong></p>';
//get user_id
$id = $_SESSION['user_id'];

//get username sent through Ajax
$mobile = $_POST['mobilenumber'];

if(!preg_match('#^[0-9]{10}#', $mobile)) {
    $errors .= $invalidemobile;

}else{

    $mobile = filter_var($mobile, FILTER_SANITIZE_NUMBER_INT);

}

if ($errors) {

    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
   exit;

} 

//run query and update username
$sql = "UPDATE users SET mobile='$mobile' WHERE user_id='$id'";

$result = mysqli_query($link, $sql);

if(!$result){
    
    echo '<div class="alert alert-danger">there was an error updating storing the new username in the database!</div>';
}

?>