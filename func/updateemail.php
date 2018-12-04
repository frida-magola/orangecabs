<?php 
//start session and connect
session_start();
include('connection.php');

$invalideEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$errors='';
//get user_id and email sent through Ajax
$user_id = $_SESSION['user_id'];
$newemail = $_POST['email'];


$email = filter_var($newemail, FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errors .= $invalideEmail; 
//        var_dump($errors);

}

if ($errors) {

    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
   exit;

} 

//check if new email exists
$sql = "SELECT * FROM users WHERE email='$email'";

$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count>0){
    
    echo "<div class=''>There is already as user registered with that email! Please choose another one!</div>"; 
    exit;
}

//run query and update username
$sql = "UPDATE users SET email='$email' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

if(!$result){
    
    echo '<div class="alert alert-danger">there was an error updating storing the new username in the database!</div>';
}
?>