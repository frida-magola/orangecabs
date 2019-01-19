<?
include('notification_db.php');

var_dump(link);

if(isset($_POST['description'])){


    $date = date('Y-m-d H:i:s', time());
    $sql = "INSERT INTO content_notification(`user_id`,`description`) 
    VALUES(':user_id',':description')";

    $statement = $link->prepare($sql);
    $statement->excute(
        array(
            'user_id' => $_SESSION['user_id'],
            'description' => $_POST['description']
        )
    );

    $result = $statement->fetchAll();

    if(isset($result)){
        echo 'done';
    }
    echo 'problem';
}

?>