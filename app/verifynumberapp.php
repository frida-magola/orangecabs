<?php
include('connect.php');

        $errors = '';
        $missingmobile = 'Please enter your mobile number!';

        //get username
        if(empty($_GET['mobile'])){
           $errors .= $missingmobile; 
        }
        else {
           $mobile = filter_var($_GET["mobile"], FILTER_SANITIZE_STRING) ;
        }

        //check if mobile number  exist
        $is_mobile_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile");
        $is_mobile_exist->bindParam(':mobile', $mobile);
        $is_mobile_exist->execute();
//        var_dump($is_opt_exist);
    //    $result_user = $is_username_exist->fetchAll();
        if($is_mobile_exist->rowCount() > 0){
            echo '1';
        }
        else {
            echo '0';
        }
?>












