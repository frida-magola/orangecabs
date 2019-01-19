<?php

 include('connect.php');
 
$json = file_get_contents('php://input'); 	
$obj = json_decode($json,true);

$mobile = $obj['mobile'];
$password = $obj['password'];

// $results = array('isme'=>0,'isMessage'=>'React Restfull Api');
// $results['ismessage'] = $obj['mobile'];
// echo json_encode($results);
//
//    
    if($obj['mobile'] ==""){
    
        echo json_encode('Mobile number required!');

    }else{

        $mobile = filter_var($mobile, FILTER_SANITIZE_NUMBER_INT);

    }

    if($obj['password'] ==""){

        echo json_encode('Mobile number required!');

    }else{

        $password = filter_var($password, FILTER_SANITIZE_STRING);

    }
    
    $password = hash('sha256', $password);
    //check if user mobile and passord does'nt exist
    $is_user_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile AND password=:password AND role='rider' AND verify='1'");
    
    $is_user_exist->execute(array(':mobile' => $mobile,
                  ':password' => $password));
    
    $row_count = $is_user_exist->fetchColumn();
   
    
    if(!$row_count == 1){
        
        echo json_encode("Wrong mobile phone or Password!");
        
    }

    else{
        
        $is_connect = $link->prepare("UPDATE users SET `is_connect`=1 WHERE mobile=:mobile AND password=:password"); 
        $is_connect->bindParam(':mobile', $mobile);
        $is_connect->bindParam(':password', $pass);
        $mobile=$mobile;
        $pass=$password;
        $is_connect->execute();
        
        echo json_encode('ok');
        
    }

?>









