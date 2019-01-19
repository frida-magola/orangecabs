<?php

    include('connect.php');
    
    $errors = '';
    //define error messages
    $missingmobile = 'Please enter your mobile number!';
    $missingPassword = 'Please enter your password!';
    
    if(empty($_GET['mobile'])){
    
        $errors .= $missingmobile;

    }else{

        $mobile = filter_var($_GET['mobile'], FILTER_SANITIZE_NUMBER_INT);

    }

    //check if user mobile and passord does'nt exist
    $is_driver_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile AND role='driver' AND verify='1'");
    
    $is_driver_exist->bindParam(':mobile',$mobile);
    $mobile = $_GET['mobile'];
    
    $is_driver_exist->execute();
    
    if(!$is_driver_exist->rowCount() == 1){
        
        echo '0';

    }

    else{
        
        $is_connect = $link->prepare("UPDATE users SET `is_connect`=1 WHERE mobile=:mobile"); 
        $is_connect->bindParam(':mobile', $mobile);
        $mobile = $mobile;

        $is_connect->execute();
        
        echo '1';
        
    }
?>











