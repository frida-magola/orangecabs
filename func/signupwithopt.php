<?php

//<!--start session-->
session_start();

//<!--connect to the database-->
include('connection.php');
//
//<!--check user inputs-->
//<!--    define error messages-->
$missingUsername ='<p><strong>Please enter a username!</strong></p>';
$missingmobile='<p><strong>Please enter your mobile number!</strong></p>';
$invalidemobile ='<p><strong>Invalid number, your number should have 10 numbers no letters!</strong></p>';
$missingPassword ='<p><strong>Please enter a password!</strong></p>';
$invalidPassword ='<p><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$differentPassword ='<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 ='<p><strong>Please confirm your password!</strong></p>';


$errors='';
$password='';
$password2='';

//<!--    get username,mobile,password,password2-->
//<!--    store errors in errors variables-->


//get username
if(empty($_POST["username"])){

 $errors .= $missingUsername;
//    var_dump($errors);

}else{

$user= filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}


//get number
if(empty($_POST["mobile"])){
    
    $errors .= $missingmobile;
//    var_dump($errors);

}elseif(!preg_match('#^[0-9]{10}#',$_POST["mobile"])){
    
    
    $errors .= $invalidemobile;
    
}
else{
    
       $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT); 

}

//get passwords
if(empty($_POST["password"])){
    
    $errors .= $missingPassword;
    
}elseif(!(strlen($_POST["password"])>=6 and preg_match('/[A-Z]/',$_POST["password"]) and preg_match('/[0-9]/',$_POST["password"]))){
    
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
    
}else{
  //<!--no errors-->   
 //<!--    prepare variables for the queries--> 
$user = mysqli_real_escape_string($link, $user);
    
$mobile = mysqli_real_escape_string($link, $mobile);
    
$password = mysqli_real_escape_string($link, $password);
    
//128 bits ->32 characters
//$password = md5($password);
    
////256 bits ->64 characters
$password = hash('sha256',$password);

    
//<!--    if mobile number exists in the users table print error-->    
$sql = "SELECT * FROM users WHERE mobile = '$mobile'";

$result = mysqli_query($link,$sql);
    
if(!$result){
    
    echo '<div class="alert alert-danger"> Error running the query!</div>';
    
    echo '<div class="alert alert-danger"> "'.mysqli_error($link).'"</div>';
    
    exit;
}
$results = mysqli_num_rows($result);

if($results){
    
    echo '<div class="alert alert-info">That mobile number is already registed.Do you want to log in? </div>'; 
    exit;
}
    
    // if username exists in the users table print error
    
$sql = "SELECT * FROM users WHERE username = '$user'";
    
    
    $result = mysqli_query($link,$sql);
    if(!$result){
        
        echo '<div class="alert alert-danger"> Error running the query!</div>';
    
    echo '<div class="alert alert-danger"> "'.mysqli_error($link).'"</div>';
    
    exit;
        
    }
    $results = mysqli_num_rows($result);
    
    if($results){
        
        echo '<div class="alert alert-info">That username is already registed.Do you want to log in? </div>'; 
    exit;
}
        
    
        	// Authorisation details.
	$username = "mwalilanyira@gmail.com";
	$hash = "fab2c29015a83c1e8abc1bf547512121a9984e2995aa434377750e9a26e9f813";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "quirky"; // This is who the message appears to be from.
	$numbers = $mobile; // A single number or a comma-seperated list of numbers
    
    $rand_opt = substr(str_shuffle("0123456789"), 0, 5);
        
	$message = "Thanks for signing up with Quirky, your one time password is. $rand_opt";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
        if($result == true){
           $opt_store = password_hash($rand_opt, PASSWORD_DEFAULT);
                
//insert user details and activation code in the users table
            $sql = "INSERT INTO users(`username`,`mobile`,`opt_hash`,`password`) VALUES('$user','$numbers','$opt_store','$password')";
    
            $result = mysqli_query($link,$sql);
            
            if(!$result){
   
    echo '<div class="alert alert-warning">There was an error inserting the users details in the database! </div>';
    echo '<div class="alert alert-warning">"'.mysqli_error($link).'"</div>';
    
    exit;
    
}else{
                   echo "<div class=\"alert alert-success\">Thank you for your registring! A confirmation OPT has been sent to $numbers. Please Click on <a href=\"http://localhost/orangecabs-final-ok/scripts/activate.php?mobile=". urlencode($numbers)."&key=$opt_store\" class=\"activate-link\">Activate your account.</a>to  Please Enter on the activation OPT to activate your account.</div>";
                
            
            }
            
            
            
        }
	curl_close($ch);    
    
}


    
?>