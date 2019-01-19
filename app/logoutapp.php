<?php

include('connect.php');
    $logout = $link->prepare("SELECT * FROM users WHERE mobile=:mobile");
    
    $logout->bindParam(':mobile', $mobile);
    $mobile=$_GET['mobile'];
    $logout->execute();
    
    if($logout->rowCount() > 0)
    {
        
        $is_logout = $link->prepare("UPDATE users SET `is_connect`=0 WHERE mobile=:mobile"); 
        $is_logout->bindParam(':mobile', $mobile);
        $mobile=$_GET['mobile'];
        $is_logout->execute();
        
        echo '1';
        
    }
?>











