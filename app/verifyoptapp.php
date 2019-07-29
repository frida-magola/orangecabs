<?php
    include('connect.php');
 
    $json = file_get_contents('php://input'); 	
    $obj = json_decode($json,true);

    $username = $obj['username'];
    $mobile = $obj['mobile'];
    $hash =$obj['opt'];
    $verifyOpt = $obj['verifyOpt'];
    
     //get username and mobile
    if($obj['username']!="" && $obj['mobile']!=""){
        if($obj['verifyOpt'] != $obj['opt']){
            echo json_encode("Enter the correct OPT!");
        }else{
            $username = filter_var($obj["username"], FILTER_SANITIZE_STRING) ;
            $mobile = filter_var($obj["mobile"], FILTER_SANITIZE_NUMBER_INT);
           //check if username exist
            $is_username_exist = $link->prepare("SELECT * FROM users WHERE username=:username AND mobile=:mobile");
            $is_username_exist->bindParam(':username', $username);
            $is_username_exist->bindParam(':mobile', $mobile);
            $is_username_exist->execute();
        //    $result_user = $is_username_exist->fetchAll();
            if($is_username_exist->rowCount() > 0){           
                $is_user_exist = $link->prepare("UPDATE users SET `verify`=1,`opt_hash`=:opt WHERE username=:username AND mobile=:mobile"); 
                $is_user_exist->bindParam(':opt', $hash);
                $is_user_exist->bindParam(':username', $username);
                $is_user_exist->bindParam(':mobile', $mobile);
                $is_user_exist->execute();
                echo json_encode('ok');
            } else {
                echo json_encode("try again later!");
            } 
        } 
    }

?>









