<?php
    include('connect.php');
        //define error messages
        $missingPassword ='Please enter a new password!';
        $invalidPassword ='Your password should be at least 6 characters long and include one capital letter and one number!';
        $differentPassword ='Passwords don\'t match!';
        $missingPassword2 ='Please confirm your password!';

        $errors = '';
        $password2 = '';
        $password21 = '';
        
                //get passwords
        if(empty($_GET["newpassword"])){

            $errors .= $missingPassword;

        }elseif(!(strlen($_GET["newpassword"]) >=6 and preg_match('/[A-Z]/',$_GET["newpassword"]) and preg_match('/[0-9]/',$_GET["newpassword"]))){

            $errors .= $invalidPassword;

        }else{

            $password2 = filter_var($_GET["newpassword"], FILTER_SANITIZE_STRING);

        }

        if(empty($_GET["confirmpassword"])){

                $errors .=$missingPassword2;

        }else{

            $password21 = filter_var($_GET["confirmpassword"], FILTER_SANITIZE_STRING);

            if($password2 !== $password21){

            $errors .= $differentPassword;

        }

        }

        //if there is an error print error messages
        if($errors){

            $resultMessgage = $errors;

            echo $resultMessgage;

        }
        else{

            //else run query and update password
            $sql = $link->prepare("UPDATE users SET password=:password WHERE mobile=:mobile");
            $sql->bindParam(':mobile', $mobile);
            $sql->bindParam(':password', $pass);
            $mobile=$_GET['mobile'];
            $pass=$password2 = hash('sha256', $_GET['newpassword']);
            $sql->execute();
            
            echo '1';

        }
?>











