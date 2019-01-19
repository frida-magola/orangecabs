<?php

    include('connect.php');
    
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
    if(empty($_GET['username'])){
       $errors .= $missingUsername; 
    }
    else {
       $username = filter_var($_GET["username"], FILTER_SANITIZE_STRING) ;
    }
    
    //get number
    if (empty($_GET["mobile"])) {

        $errors .= $missingmobile;
    //    var_dump($errors);

    } elseif (!preg_match('#^[0-9]{10}#', $_GET["mobile"])) {
        $errors .= $invalidemobile;

    } else {

        $mobile = filter_var($_GET["mobile"], FILTER_SANITIZE_NUMBER_INT);

    }
    
    //get email
    if (empty($_GET["email"])) {

        $errors .= $missingEmail;
    //    var_dump($errors);

    } else {

        $email = filter_var($_GET["email"], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $errors .= $invalideEmail; 
    //        var_dump($errors);

        }
    }

    //get passwords
    if (empty($_GET["password"])) {

        $errors .= $missingPassword;

    } elseif (!(strlen($_GET["password"]) >= 6 and preg_match('/[A-Z]/', $_GET["password"]) and preg_match('/[0-9]/', $_GET["password"]))) {

        $errors .= $invalidPassword;

    } else {

        $password = filter_var($_GET["password"], FILTER_SANITIZE_STRING);
    }
    
    //check if username exist
    $is_username_exist = $link->prepare("SELECT * FROM users WHERE username=:username");
    $is_username_exist->bindParam(':username', $username);
    $is_username_exist->execute();
//    $result_user = $is_username_exist->fetchAll();
    if($is_username_exist->rowCount() > 0){
        $errors .= "username already exist!";
        exit;
    }
    
    //check the mobile user
    $is_mobile_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile");
    $is_mobile_exist->bindParam(':mobile', $mobile);
    $is_mobile_exist->execute();
//    $result_user = $is_username_exist->fetchAll();
    if($is_mobile_exist->rowCount() > 0){
        $errors .= "mobile already exist!";
       exit;
    }
    
    //check user email
    $is_email_exist = $link->prepare("SELECT * FROM users WHERE email=:email");
    $is_email_exist->bindParam(':email', $email);
    $is_email_exist->execute();
//    $result_user = $is_username_exist->fetchAll();
    if($is_email_exist->rowCount() > 0){
        $errors .= "Email address already exist!";
        exit;
    }
    
    if($errors){
        
        $resultMessage = $errors;
        echo $resultMessage;
        exit();
        
    }
    else{
        
       $stmt = $link->prepare("INSERT INTO users(username,mobile,email,opt_hash,password,role)VALUES(:username,:mobile,:email,:opt_hash,:password,role='rider')");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':mobile',$mobile);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password2);
        $stmt->bindParam(':opt_hash', $opt);

        $username = $_GET['username'];
        $mobile = $_GET['mobile'];
        $email = $_GET['email'];
        $password2 = hash('sha256', $_GET['password']);
        $opt = $_GET['opt_hash'];

        $stmt->execute();
        
        $idInsert =$link->lastInsertId();
        
        echo '1';
        
    }
?>







