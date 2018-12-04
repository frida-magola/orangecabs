<?php

session_start();
include("../func/connection.php");

$query = "UPDATE login_details SET last_activity=now() WHERE login_details_id='".$_SESSION['login_details_id']."'";

$result = mysqli_query($link,$query);


?>