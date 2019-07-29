<?php
    include('connect.php');
 
    $json = file_get_contents('php://input'); 	
    $obj = json_decode($json,true);

    $mobile = $obj['mobile'];

        //get username
        if($obj['mobile']!=""){
           $mobile = filter_var($obj["mobile"], FILTER_SANITIZE_STRING); 
                   //check if mobile number  exist
            $is_mobile_exist = $link->prepare("SELECT * FROM users WHERE mobile=:mobile");
            $is_mobile_exist->bindParam(':mobile', $mobile);
            $is_mobile_exist->execute();
            if($is_mobile_exist->rowCount() > 0){
                echo json_encode("ok");
            }
            else {
               echo json_encode("This number does not exist!");
            }
        }

?>












