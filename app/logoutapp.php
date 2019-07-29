<?php

include('connect.php');

    $json = file_get_contents('php://input'); 	
    $obj = json_decode($json,true);

    $mobile = $obj['mobile'];
    // $username = $obj['username'];
    $token = $obj['token'];
    
    if($obj['mobile']!="" && $obj['token']!=""){
        $logout = $link->prepare("SELECT * FROM users WHERE mobile=:mobile AND access_token=:token");    
        $logout->bindParam(':mobile', $mobile);
        $logout->bindParam(':token', $token);
        $logout->execute();
        
        if($logout->rowCount() > 0){
        
            $is_logout = $link->prepare("UPDATE users SET `is_connect`=0,`access_token`=:tokenVide WHERE mobile=:mobile AND access_token=:token"); 
            $is_logout->bindParam(':mobile', $mobile);
            $is_logout->bindParam(':token', $token);
            $is_logout->bindParam(':tokenVide', $tokenVide);
            $tokenVide="NULL";
            $is_logout->execute();

            echo json_encode('ok');
        
         }
    }

?>











