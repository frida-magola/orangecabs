<?php

    session_start();
    include("../func/connection.php");
    // print_r($_FILES);

    $user_id = $_SESSION['user_id'];

    //get the name of the file
    $name = $_FILES["picture"]["name"];
    $extension = pathinfo($name, PATHINFO_EXTENSION);

    $fileError = $_FILES["picture"]["error"];

    //tempory location
    $tmp_name = $_FILES["picture"]["tmp_name"];

    $permanentDestionation = 'profilepicture/'. md5(time()) . ".$extension";
    
    //move file
    if(move_uploaded_file($tmp_name, $permanentDestionation)){
        //update file in the database
        $sql = "UPDATE users SET profilepicture='$permanentDestionation' WHERE user_id='$user_id'";

        //run the query
        $result = mysqli_query($link,$sql);

        if(!$result){
            echo "<div class=\"alert alert-danger\">Unable to upload profile picture please try again later!</div>";
        }
        else{
            echo "<div class=\"alert alert-success\">profile picture upadeted!</div>";
        }

    }else{

        echo "<div class=\"alert alert-danger\">Unable to upload profile picture please try again later!</div>";
    }

    if($fileError > 0){
        echo "<div class=\"alert alert-danger\">Unable to upload profile picture please try again later! Error Code: $fileError </div>";
    }
?>