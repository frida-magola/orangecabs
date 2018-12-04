<?php
session_start();
include('notification_db.php');
include('functions.php');

echo fetch_user_chat_history($_SESSION['user_id'],$_POST['to_user_id'],$link);

?>