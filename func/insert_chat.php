<?
    session_start();
    include('notification_db.php');
    include('functions.php');

    $data = array(
        ':to_user_id' => $_POST['to_user_id'],
        ':from_user_id' => $_SESSION['user_id'],
        ':chat_message' => $_POST['chat_message'],
        ':status' => '1',

    );

    $query = "INSERT INTO chat_message(`to_user_id`,`from_user_id`,`chat_message`,`status`) 
    VALUES(:to_user_id,:from_user_id,:chat_message,:status)";

    $result = $link->prepare($query);
    if($result->execute($data)){
        echo fetch_user_chat_history($_SESSION['user_id'],$_POST['to_user_id'],$link);
    }
?>