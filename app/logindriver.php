<?php
//start session
session_start();

 include('connect.php');
 
    $json = file_get_contents('php://input'); 	
    $obj = json_decode($json,true);

    $mobile = $obj['mobile'];
    $password = $obj['password'];
    $token = $obj['token'];
    
    if($obj['mobile']!="" && $obj['password']!=""){
        
        $mobile = filter_var($obj["mobile"], FILTER_SANITIZE_NUMBER_INT);
        $pass = filter_var($obj["password"], FILTER_SANITIZE_STRING);
        $password = hash('sha256', $pass);
        $token = $obj['token'];
        //check if user mobile and passord does'nt exist
        $is_user_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile AND password=:password AND role='driver'AND verify='1'");

        $is_user_exist->execute(array(':mobile' => $mobile,
                      ':password' => $password));

        $row_count = $is_user_exist->fetchColumn();

        if(!$row_count == 1){

            echo json_encode("Wrong mobile phone or Password!");

        }else{

        $is_connect = $link->prepare("UPDATE users SET `is_connect`=1,`opt_hash`=:opt,`access_token`=:token WHERE mobile=:mobile AND password=:password"); 
        $is_connect->bindParam(':opt', $opt);
        $is_connect->bindParam(':token', $token);
        $is_connect->bindParam(':mobile', $mobile);
        $is_connect->bindParam(':password', $password);
        $opt="";
        $is_connect->execute();
        
        echo json_encode('ok');
         
       }  
    }
?>











