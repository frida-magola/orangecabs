<?php

    include('connect.php');
 
    $json = file_get_contents('php://input'); 	
    $obj = json_decode($json,true);

    $username = $obj['username'];
    $mobile = $obj['mobile'];
    $email = $obj['email'];
    $password = $obj['password'];
    $confirmPassword = $obj['password2'];
     
    $errors = '';
    $missingUsername = 'Please enter a username!';
    $missingmobile = 'Please enter your mobile number!';
    $invalidemobile = 'Invalid number, your number should have 10 numbers no letters!';
    $missingPassword = 'Please enter a password!';
    $invalidPassword = 'Your password should be at least 6 characters long and include one capital letter and one number!';
    $differentPassword = 'Passwords don\'t match!';
    $missingPassword2 = 'Please confirm your password!';

    $missingEmail = 'Please enter your email address!';
    $invalideEmail = 'Please enter a valid email address!';
     
    //get username
    if($obj['username']!=""){
        $username = filter_var($obj["username"], FILTER_SANITIZE_STRING) ;
       //check if username exist
        $is_username_exist = $link->prepare("SELECT * FROM users WHERE username=:username");
        $is_username_exist->bindParam(':username', $username);
        $is_username_exist->execute();
    //    $result_user = $is_username_exist->fetchAll();
        if($is_username_exist->rowCount() > 0){
    //        $errors .= "username already exist!";
            echo json_encode("username already exist!");
            exit;
        } 
    }

    //get number
    if($obj["mobile"]!=""){
        
        if(!preg_match('#^[0-9]{10}#', $obj["mobile"])){
            echo json_encode("Your password should be at least 6 characters long and include one capital letter and one number!");
            exit;
        }else{
            $mobile = filter_var($obj["mobile"], FILTER_SANITIZE_NUMBER_INT); 
             //check the mobile user
            $is_mobile_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile");
            $is_mobile_exist->bindParam(':mobile', $mobile);
            $is_mobile_exist->execute();
        //    $result_user = $is_username_exist->fetchAll();
            if($is_mobile_exist->rowCount() > 0){
        //        $errors .= "mobile already exist!";
                echo json_encode("mobile already exist!");
               exit;
            }
        }
    }
    
    //get email
    if($obj["email"]!=""){
        
        if(!filter_var($obj["email"], FILTER_VALIDATE_EMAIL)){
            echo json_encode("Please enter a valid email address!");
            exit;

        }else{
            $email = filter_var($obj["email"], FILTER_SANITIZE_EMAIL);
               //check user email
            $is_email_exist = $link->prepare("SELECT * FROM users WHERE email=:email");
            $is_email_exist->bindParam(':email', $email);
            $is_email_exist->execute();
        //    $result_user = $is_username_exist->fetchAll();
            if($is_email_exist->rowCount() > 0){
        //        $errors .= "Email address already exist!";
                echo json_encode("Email address already exist!");
        //        exit;
            } 
        }
    }
    //get passwords
    if($obj["password"]!=""){

        if(!(strlen($obj["password"]) >= 6 and preg_match('/[A-Z]/', $obj["password"]) and preg_match('/[0-9]/', $obj["password"]))){

        echo json_encode("Your password should be at least 6 characters long and include one capital letter and one number!");
        
        }else{
           $password = filter_var($obj["password"], FILTER_SANITIZE_STRING); 
        }

    }
    
    if($obj["password2"]!=""){
        
        $password2 = filter_var($obj["password2"], FILTER_SANITIZE_STRING);

        if($password !== $password2){

            echo json_encode("Passwords don\'t match!");
            exit;
        }
    }
   
       
        $stmt = $link->prepare("INSERT INTO users(username,mobile,email,password,role)VALUES(:username,:mobile,:email,:password,role='rider')");;
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':mobile',$mobile);
        $stmt->bindParam(':email',$email);
//        $stmt->bindParem(':opt_hash',$opthash);
        $stmt->bindParam(':password',$password1);
//        $stmt->bindParam(':role',$role);
        $password1 = hash('sha256', $password);
//        $role = 'rider';
        $stmt->execute();
        $last_id = $link->lastInsertId();
        
         echo json_encode('ok');
 
  
?>







