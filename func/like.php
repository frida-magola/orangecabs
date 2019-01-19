<?
session_start();
include('notification_db.php');
// include('functions.php');
if(isset($_POST['content_id'])){

    $query = "INSERT INTO user_content_like(`content_id`,`user_id`) 
    VALUES(':user_id',
    ',':content_id')";

    $statement = $link->prepare($query);
    $statement->execute(
        array(
            ':content_id' => $_POST['content_id'],
            ':user_id' => $_SESSION['user_id']
        )
    );

    $result = $statement->fetchAll();
    if(isset($result)){
        echo "done";
    }
}
?>