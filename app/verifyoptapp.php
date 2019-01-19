<?php
include('connect.php');

        $errors = '';
        $missingopt = 'Please enter the OPT!';

        //get username
        if(empty($_GET['opt_hash'])){
           $errors .= $missingopt; 
        }
        else {
           $opt = filter_var($_GET["opt_hash"], FILTER_SANITIZE_STRING) ;
        }

        //check if username exist
        $is_opt_exist = $link->prepare("SELECT * FROM users WHERE opt_hash=:opt_hash");
        $is_opt_exist->bindParam(':opt_hash', $opt);
        $is_opt_exist->execute();
//        var_dump($is_opt_exist);
    //    $result_user = $is_username_exist->fetchAll();
        if($is_opt_exist->rowCount() > 0){
            
            $verify_opt = "UPDATE users SET `verify` = 1, `opt_hash` ='' WHERE opt_hash='".$_GET['opt_hash']."'";
            $verify_result = $link->prepare($verify_opt); 
            $verify_result->execute();

            echo '1';
        }
        else {
            echo '0';
        }

?>









