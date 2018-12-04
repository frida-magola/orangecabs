<?php
include("notification_db.php");

session_start();

$query = "UPDATE login_details SET last_activity = now() WHERE login_details_id='".$_SESSION['login_details_id']."'";

$statement = $link->prepare($query);
$statement->execute();

?>