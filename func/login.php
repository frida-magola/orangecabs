<?php
//start session
session_start();

//connect to the database
include('connection.php');

//chech user inputs
    //define error messages
    $missingmobile = '<p><strong>Please enter your mobile number!</strong></p>';
    $missingPassword = '<p><strong>Please enter your password!</strong></p>';

$errors = '';

//get email and password
//store errors in errors variable
if(empty($_POST['loginmobile'])){
    
    $errors .= $missingmobile;
    
}else{
    
    $mobile = filter_var($_POST['loginmobile'], FILTER_SANITIZE_EMAIL);
    
}

if(empty($_POST['loginpassword'])){
    
    $errors .= $missingPassword;
    
}else{
    
    $password = filter_var($_POST['loginpassword'], FILTER_SANITIZE_STRING);
    
}

//if there are any errors
if($errors){
    
   $resultMessage = '<div class="alert danger">'.$errors.'</div>';
    echo $resultMessage;
    
}else{
    
    //else no error
    //prepare variables for the query
    $mobile = mysqli_real_escape_string($link,$mobile);
    $password = mysqli_real_escape_string($link,$password);
    $password = hash('sha256', $password);
    
    //Run quey: chech combination or email and password exists
    $sql = "SELECT * FROM users WHERE mobile='$mobile' AND password='$password' AND verify='1'";

    
    $result = mysqli_query($link,$sql);
    
    if(!$result){
        
        echo '<div class="alert danger">Error running the query!</div>';
        
        exit;
    }
    
    //if email and password don't match print error
    $count = mysqli_num_rows($result);
    
    if(!$count == 1){
        
        echo '<div class="alert danger paragraph">Wrong mobile phone or Password!</div>';
        
    }else{
        
       $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $_SESSION['user_id'] = $rows['user_id'];
        
       $_SESSION['username'] = $rows['username'];
        
        $_SESSION['mobile'] = $rows['mobile'];

        //sent data in login_details table
        $sub_query = "INSERT INTO login_details(`user_id`,`status`) VALUES('".$rows['user_id']."','1')";
    
        $statement = $link->prepare($sub_query);
        $statement->execute();

        //create session for login_details_id
        // $_SESSION['login_details_id'] = $link->lastInsertId();
        $_SESSION['login_details_id'] = mysqli_insert_id($link);

        $sub_is_connect = "UPDATE users SET `is_connect`='1' WHERE user_id='".$rows['user_id']."'";
        $result_sub_is_connect = $link->prepare($sub_is_connect); 
        $result_sub_is_connect->execute(); 
        //redirect user to the specific pages
        if($mobile === '0638206725'){

            echo 'admin';

        }else{

            echo 'users';
        }
        
        
    }

}

?>