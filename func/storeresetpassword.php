<!--//this file receives: user_id, generated key to reset password, password1 and password2

//this file then resets password for user_id if all checks are correct-->
<?php

session_start();

include('connection.php');

//if email or activation key is missing show error
if(!isset($_POST["user_id"]) || !isset($_POST["key"])){
    
    echo '<div class="alert alert-danger">There was an error. Please click on the reset password you received by email.</div>';
    
    echo '<div class="alert alert-danger"> "'.mysqli_error($link).'"</div>';
    
    exit;
}

//else
    //store them in two variables
$user_id = $_POST["user_id"];
$key = $_POST["key"];
$time = time() - 86400;

//prepare variables for query
$user_id = mysqli_real_escape_string($link,$user_id);
$key = mysqli_real_escape_string($link,$key);

//run query:set activation field to "activated" for the provided email
$sql = "SELECT user_id FROM forgotpassword WHERE activation_key='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
            
$result = mysqli_query($link,$sql);

if(!$result){
    
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
//if combination does not exist
    //show an errormessage
$count = mysqli_num_rows($result);
if($count !== 1){
        
    echo '<div class="alert alert-danger">Please try again!</div>';
    exit;
    
}

//<!--check user inputs-->
//<!--    define error messages-->
$missingPassword ='<p><strong>Please enter a password!</strong></p>';
$invalidPassword ='<p><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$differentPassword ='<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 ='<p><strong>Please confirm your password!</strong></p>';

$errors = '';

//get passwords
if(empty($_POST["password"])){
    
    $errors .= $missingPassword;
    
}elseif(!(strlen($_POST["password"])>6 and preg_match('/[A-Z]/',$_POST["password"]) and preg_match('/[0-9]/',$_POST["password"]))){
    
    $errors .= $invalidPassword;
    
}else{
    
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    
}

if(empty($_POST["password2"])){
        
        $errors .=$missingPassword2;

}else{
        
    $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
    
    if($password !== $password2){
            
    $errors .= $differentPassword;

}
              
}

//<!--    if there are any errors prints errors-->
if($errors){
    
    echo $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    
    exit;
    
}

//<!--no errors-->   
 //<!--    prepare variables for the queries--> 
    
$user_id = mysqli_real_escape_string($link, $user_id);
    
$password = mysqli_real_escape_string($link, $password);
    
//128 bits ->32 characters
//$password = md5($password);
    
////256 bits ->64 characters
$password = hash('sha256',$password);

$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";

$result = mysqli_query($link, $sql);
if(!$result){
    
    echo '<div class="alert alert-danger">There was a problem storing the new password in the database!</div>';
    
    exit;
}
//set the key status to "used" in the forgotpassword table to prevent the key from being used twice
$sql = "UPDATE forgotpassword SET status='used' WHERE activation_key='$key' AND user_id='$user_id'";

$result = mysqli_query($link,$sql);
if(!$result){
    
    echo '<div class="alert alert-danger">Error running the query!</div>';
    
}else{
    
    echo '<div class="alert alert-success">Your password has been update successfully! <a href="../index.php">Login</a></div>';
}

?>