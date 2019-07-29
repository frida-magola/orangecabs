<?php

    include('connect.php');
 
    $json = file_get_contents('php://input'); 	
    $obj = json_decode($json,true);

    $mobile = $obj['mobile'];
    $password = $obj['password'];
    $confirmPassword = $obj['confirmPassword'];

    //get passwords
    if($obj["password"]!=""){

        if(!(strlen($obj["password"]) >= 6 and preg_match('/[A-Z]/', $obj["password"]) and preg_match('/[0-9]/', $obj["password"]))){

        echo json_encode("Your password should be at least 6 characters long and include one capital letter and one number!");
        
    }else{
        $password = filter_var($obj["password"], FILTER_SANITIZE_STRING); 
    }
    }
    
    if($obj["confirmPassword"]!=""){
        
        $password2 = filter_var($obj["confirmPassword"], FILTER_SANITIZE_STRING);

        if($password !== $password2){

            echo json_encode("Passwords don\'t match!");
            exit;
        }
    }
        //check the password if exist
           $password1 = hash('sha256', $password);
           $is_password_exist = $link->prepare("SELECT * FROM users WHERE password=:password AND mobile=:mobile");
           $is_password_exist->bindParam(':password', $password1);
           $is_password_exist->bindParam(':mobile', $mobile);
           $is_password_exist->execute();
        //    $result_user = $is_username_exist->fetchAll();
            if($is_password_exist->rowCount() > 0){
        //        $errors .= "username already exist!";
                echo json_encode("this password already used. Please choose another!");
               
            }else{
            
            $stmt = $link->prepare("UPDATE users SET `password`=:password WHERE mobile=:mobile");
            $stmt->bindParam(':password',$password1);
            $stmt->bindParam(':mobile',$mobile);
            $stmt->execute();
            $last_id = $link->lastInsertId();
            echo json_encode('ok'); 
            }
?>







