<?php 
//start session an connect
session_start();

include('connection.php');

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

//define error messages
$missingPassword ='<p><strong>Please enter a new password!</strong></p>';
$invalidPassword ='<p><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$differentPassword ='<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 ='<p><strong>Please confirm your password!</strong></p>';

$errors = '';
$password = '';
$password2 = '';

//get passwords
if(empty($_POST["newpassword"])){
    
    $errors .= $missingPassword;
    
}elseif(!(strlen($_POST["newpassword"]) >=6 and preg_match('/[A-Z]/',$_POST["newpassword"]) and preg_match('/[0-9]/',$_POST["newpassword"]))){
    
    $errors .= $invalidPassword;
    
}else{
    
    $password = filter_var($_POST["newpassword"], FILTER_SANITIZE_STRING);
    
}

if(empty($_POST["confirmpassword"])){
        
        $errors .=$missingPassword2;

}else{
        
    $password2 = filter_var($_POST["confirmpassword"], FILTER_SANITIZE_STRING);
    
    if($password !== $password2){
            
    $errors .= $differentPassword;

}
              
}

//if there is an error print error messages
if($errors){
    
    $resultMessgage = "<div class='alert danger''>$errors</div>";
    
    echo $resultMessgage;
    
}else{
    
    $password = mysqli_real_escape_string($link, $password);
    
    $password = hash('sha256', $password);
    
    //else run query and update password
    $sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
    
    $result = mysqli_query($link, $sql);
    if(!$result){
        
        echo "<div class='alert danger'>The password could not be reset. Please try again later.</div>";
        
    }else{
        
        echo "<div class='alert success'>Your password has been updated successfully!</div>";
        echo "<a href=\"../\" class=\"btn btn--green\" role=\"button\">Login</a>";
        // header('Location: http://localhost/orangecabs/index.php');
    }
    
}


?>