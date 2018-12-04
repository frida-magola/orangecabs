<?php 

include("connection.php");
if(isset($_SESSION['user_id']) && $_GET['logout'] == 1){
   
    //destroy the session
    session_destroy();
    
    $sub_query = "UPDATE login_details SET status='0' WHERE user_id='{$_SESSION['user_id']}' AND status = '1'";
    $result_login_details_status = $link->prepare($sub_query); 
    $result_login_details_status->execute();

    $sub_is_connect = "UPDATE users SET `is_connect`='0' WHERE user_id='{$_SESSION['user_id']}'";
    $result_sub_is_connect = $link->prepare($sub_is_connect); 
    $result_sub_is_connect->execute();   
    // $result_sub_is_connect = mysqli_query($link,$sub_is_connect);
    
    
    //destroy the cookie
    setcookie("rememberme", "", time()-3600);
}

?>